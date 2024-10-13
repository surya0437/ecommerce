<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ShippingAddress;
use Illuminate\Support\Facades\Auth;
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
}
