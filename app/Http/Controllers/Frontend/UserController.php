<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\ShippingAddress;
use App\Models\OrderDescription;
use App\Http\Controllers\Controller;
use App\Mail\OrderNotification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\View;

class UserController extends Controller
{
    public function __construct()
    {
        $random_product = Product::Where('status', 1)->Pluck('name')->random();
        View::share(['random_product' => $random_product]);
    }
    public function cart_page($id)
    {
        $single_product = Product::where('id', $id)->first();
        $products = Product::where('status', 1)->take(9)->get();
        return view('frontend.cart-page', compact('products', 'single_product'));
    }


    public function cart_store(Request $request)
    {
        $user_id = Auth::guard('web')->user()->id;

        $request->validate([
            'quantity' => 'required|numeric|min:1|max:10',
        ]);

        $cartItem = Cart::where('user_id', $user_id)->where('product_id', $request->product_id)->first();

        if ($cartItem) {
            $cartItem->quantity = $cartItem->quantity + $request->quantity;
            $cartItem->price = $cartItem->quantity * $cartItem->product->price - (($cartItem->quantity * $cartItem->product->price * $cartItem->product->discount_percentage) / 100);
            $cartItem->update();
            toast('Product quantity updated', 'success');
            return redirect()->back();
        }

        $product = Product::find($request->product_id);

        $single_product_price = $product->price - (($product->price * $product->discount_percentage) / 100);

        $cart = new Cart();
        $cart->user_id = $user_id;
        $cart->product_id = $request->product_id;
        $cart->quantity = $request->quantity;
        $cart->price = $request->quantity * $single_product_price;

        $cart->save();

        toast('Product added to cart', 'success');
        return redirect()->back();
    }

    public function cart()
    {
        $carts = Cart::where('user_id', Auth::guard('web')->user()->id)->get();
        return view('user.cart', compact('carts'));
    }

    public function cart_delete($id)
    {
        $cart = Cart::find($id);
        $cart->delete();
        toast('Product removed from cart', 'success');
        return redirect()->back();
    }

    public function checkout()
    {
        $shipping_addresses = ShippingAddress::where('user_id', Auth::guard('web')->user()->id)->get();
        return view('user.checkout', compact('shipping_addresses'));
    }

    public function shipping_address(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'phone' => 'required|string|digits_between:10,15',
            'address' => 'required|string|max:500',
        ]);
        $shipping_address = new ShippingAddress();
        $shipping_address->user_id = Auth::guard('web')->user()->id;
        $shipping_address->title = $request->title;
        $shipping_address->phone = $request->phone;
        $shipping_address->address_note = $request->address;
        $shipping_address->save();
        toast('Shipping address added', 'success');
        return redirect()->back();
    }

    public function place_order(Request $request)
    {
        $request->validate([
            'shipping_address' => 'required',
        ]);
        $vendors = [];
        $total = 0;
        $total_amt = 0;
        $carts = Cart::where('user_id', Auth::guard('web')->user()->id)->get();
        $user = Auth::guard('web')->user();
        foreach ($carts as $cart) {
            $total += $cart->price;
            if (!in_array($cart->product->vendor, $vendors)) {
                $vendors[] = $cart->product->vendor;
            }
        }

        foreach ($vendors as $vendor) {
            $order = new Order();
            $order->order_number = rand(100000, 999999);
            $order->user_id = $user->id;
            $order->vendor_id = $vendor->id;
            $order->shipping_address_id = $request->shipping_address;
            $order->total_amount = round($total,2);
            $order->save();

            foreach ($carts as $cart) {
                if ($cart->product->vendor->id == $vendor->id) {
                    $total_amt += $cart->price;
                    $order_description = new OrderDescription();
                    $order_description->order_id = $order->id;
                    $order_description->product_id = $cart->product->id;
                    $order_description->quantity = $cart->quantity;
                    $order_description->price = $cart->price;
                    $order_description->save();
                }

                $cart->delete();
            }

            $data = [
                'name' => $vendor->name,
                'subject' => "New order has been placed",
                'message' => $user->name . " has placed an order. Please check it out.",
                'order_number' => $order->order_number,
                'total_amount' => $total_amt,
                'vendor_name' => $vendor->name,
                'customer_name' => $user->name,
                'shipping_address' => $request->shipping_address,
            ];
            Mail::to($vendor->email)->send(new OrderNotification($data));
        }
        toast('Order placed successfully', 'success');
        return redirect()->route('history.view');
    }

    public function order_history()
    {
        return view('user.order_history');
    }
}
