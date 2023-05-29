<?php

namespace App\Http\Controllers\Oauth;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;

class MicrosoftController extends Controller
{

    public function login()
    {
        return Socialite::driver('microsoft')->redirect();
    }

    public function callback(): RedirectResponse
    {
        $user = Socialite::driver('microsoft')->user();

        // Store Access token
        session()->put('access_token', $user->token);

        // Let's create a new entry in our users table (or update if it already exists) with some information from the user
        $user = User::updateOrCreate([
            'name' => $user->name,
            'email' => $user->email,
        ]); 

        // Logging the user in and remember user
        Auth::login($user, true);

        // Here, you should redirect to your app's authenticated pages (e.g. the user dashboard)
        return redirect(RouteServiceProvider::HOME);
    }

}
