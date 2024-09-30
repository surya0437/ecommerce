<?php

use App\Mail\EmailNotification;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\PageController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [PageController::class, 'home'])->name('home');
Route::post('/vendor-create', [PageController::class, 'vendor_create'])->name('vendor-create');


Route::get('/pass', function () {

    return Hash::make('@123Surya');

    // $data = [
    //     "name" => "Surya",
    //     "subject" => "Vendor Registration Approved",
    //     // "message" => "Your Vendor Registration has been approved.\nYour Login Credentials are\nEmail: $vendor->email\nPassword: $password",
    //     "email" => "sdknksa",
    //     "password" => "password"
    // ];
    // Mail::to("suryasnc12345@gmail.com")->send(new EmailNotification($data));
    // return view('Mail.email-notification', compact('data'));

});
