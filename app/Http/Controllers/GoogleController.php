<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function register(){
        return view('register');
    }
    public function redirectToGoogle(){
        return Socialite::driver('google')->redirect();
    }
    public function handleGoogleCallback(){
        $user = Socialite::driver('google')->user();
        $localUser = User::where('email', $user->email)->first();

        if(!$localUser){
            $localUser = User::create([
                'name' => $user->name,
                'email'=> $user->email,
                'google_id' => $user->id,
                'password' => Hash::make(Str::random(20)),
            ]);
        }
        Auth::login($localUser);
        return redirect('/');
    }
    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
