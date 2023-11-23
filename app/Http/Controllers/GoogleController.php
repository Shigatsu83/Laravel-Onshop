<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
    public function redirectToGoogle(){
        return Socialite::driver('google')->redirect();
    }
    public function handleGoogleCallback(){
        try {
            $user = Socialite::driver('google')->user();
            // dd($user);
            $finduser = User::where('google_id',$user->getId())->first();
            //dd($user);
            if($finduser){
                Auth::login($finduser);
                return redirect()->intended('/');
            }else{
                $newUser = User::create([
                    'name'=>$user->name,
                    'email'=>$user->email,
                    'google_id'=>$user->id,
                    'password'=>bcrypt('12345678')
                ]);

                Auth::login($newUser);
                return redirect()->intended('/');
            }

        } catch (\Throwable $th) {
            
        }
    }
    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}