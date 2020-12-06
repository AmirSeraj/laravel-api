<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    //
    public function login(LoginRequest $request)
    {
        $request->validate([
            'username'=>'required|string|email',
            'password'=>'required|string|min:8|max:20'
        ]);

        $user = auth()->attempt([
            'email'=>$request->username,
            'password'=>$request->password,
        ]);
        if (auth()->check()){
            return response([
                'token'=>auth()->user()->generateToken(),
            ]);
        }
    }

    public function logout()
    {
        if (auth('api')->check()) {
            $user = auth()->guard('api')->user();  /// $user = auth('api')->user()
            $user->logout();
        }
        return $user;
    }

    public function currentUser()
    {
        return auth('api')->user();
    }

}









