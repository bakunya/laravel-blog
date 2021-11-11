<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class Register extends Controller {
    public function register_view() {
        return view("register");
    }

    public function authenticate(Request $request) {
        $credentials = $request->validate([
            "email" => "required|unique:users|email",
            "username" => "required|unique:users|alpha_dash",
            "password" => "required|min:6",
        ]);

        $user = new User();
        $user->email = $request->input('email');
        $user->username = $request->input('username');
        $user->password = Hash::make($request->input('password'));
        $user->save();
    }
}