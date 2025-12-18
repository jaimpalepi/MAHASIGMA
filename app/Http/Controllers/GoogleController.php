<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
class GoogleController extends Controller
{
    public function redirectToGoogle(Request $request){
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback(Request $request){
        $user = Socialite::driver('google')->user();
        $findUser = User::where("google_id", $user->id)->first();

        if (!is_null($findUser)){
            Auth::login($findUser);
        } else {
            $findUser = User::create([
                "name"=>$user->name,
                "email"=>$user->email,
                "google_id"=>$user->id,
                "role" => 'mahasiswa',
                "password"=>encrypt("basfbauifb")
            ]);
            Auth::login($findUser);
        }
        return redirect()->route('artikel.index');
    }
}
