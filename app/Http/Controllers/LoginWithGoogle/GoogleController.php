<?php

namespace App\Http\Controllers\LoginWithGoogle;

use Exception;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function handleGoogleCallback()
    {

        $user = Socialite::driver('google')->user();
        $finduser = User::where('google_id', $user->id)->first();

        $registered_user = User::where('email', $user->email)->first();

        if ($registered_user) {

            Auth::login($registered_user);
            return redirect()->route('dashboard');
        }

        if ($finduser) {

            Auth::login($finduser);
            return redirect()->route('dashboard');
        } else {
            $newUser = User::updateOrCreate(['email' => $user->email], [
                'name' => $user->name,
                'google_id' => $user->id,
                'password' => Hash::make('BazzarX Market')
            ]);

            Auth::login($newUser);

            return redirect()->route('dashboard');
        }
    }
}
