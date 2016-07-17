<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Laravel\Socialite\Facades\Socialite;
use Auth;
use App\User;
use Hash;

class GithubAuthController extends Controller
{
    public function redirectToProvider()
    {
        return Socialite::with('github')->redirect();
    }

    public function handleProviderCallback()
    {
        $user = Socialite::with('github')->user();

        $data["first_name"] = (explode(" ",$user["name"]))[0];
        $data["last_name"] = (explode(" ",$user["name"]))[1];
        $data["email"] = $user["email"];

        $regUser =User::where('email', $data["email"])->first();

        /* User exists in DB*/
        if($regUser !== null) {
            $userArray = $regUser->toArray();
            Auth::loginUsingId($userArray["id"]);

            return redirect()->action('HomeController@index')
                                    ->with("dialog","Now authorized! Welcome back, {$userArray['first_name']}");

        }else{
            $textPassword = str_random(6);
            $data["password"] = Hash::make($textPassword);
            $newUser= User::create($data);
            Auth::login($newUser);

            return redirect()->action('HomeController@index')
                ->with("dialog","Now registered an logged in with credentials 
                           email:: {$data['email']} , and password::  {$textPassword}");
        }
    }
}
