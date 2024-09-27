<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Vendor;
use App\Models\VendorStore;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PageController extends Controller
{
    public function home()
    {
        return view('frontend.home');
    }

    public function vendor_create(Request $request)
    {
        // return $request->all();
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:vendors,email|max:255',
            'phone' => 'required|numeric|digits_between:10,15',
            'vendor_name' => 'required|string|max:255',
            'vendor_address' => 'required|string|max:500',
        ]);

        $vendor = new Vendor();
        $vendor->name = $request->name;
        $vendor->email = $request->email;
        $vendor->phone = $request->phone;
        $vendor->password = Hash::make('password');
        $vendor->save();

        $vendor_store = new VendorStore();

        $vendor_store->name = $request->vendor_name;
        $vendor_store->email = $request->email;
        $vendor_store->phone = $request->phone;
        $vendor_store->address = $request->vendor_address;
        $vendor_store->vendor_id = $vendor->id;

        $vendor_store->save();

        toast('Your request has been submitted ! Wait for admin approval','success');
        return redirect()->back();

    }
}
