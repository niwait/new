<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
    public function login(Request $request)
    {

        $credentials = $request->only('email', 'password');

        //ログインの処理
        if (Auth::attempt($credentials)) {

            $user_id = Auth::id();
            $user = User::find($user_id);
            //$user->token=token(80);
            //ログイン状態にする
            Auth::login($user);
            return response()->json($user->api_token);
        } else {
            return response()->json("");
        }
    }

    public function logout()
    {
        // $auth = Auth::id();

        // return  $auth;
        // $user = User::find($user_id);
        // $user->api_token = null;
        // $user->save();
        Auth::logout();
    }

    public function userCreate(Request $request)
    {

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->api_token = Str::random(80);
        $user->save();
        return $user->all();
    }
}
