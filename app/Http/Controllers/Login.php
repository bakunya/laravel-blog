<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Login extends Controller {
    public function login_view(Request $request) {
        return view("login");
    }

    public function authenticate(Request $request) {
        $credentials = $request->validate([
            "email" => "required|email",
            "password" => "required|min:6",
        ]);

        if(Auth::attempt($credentials)) {
            $request->session()->regenerate();

            $user = User::where('email', $credentials["email"])->get();
            $user = $user->reject(function ($user) {
                return $user->canceled;
            });
            $user = $user->first();
            
            $request->session()->put("user_id", $user->id);
            $request->session()->put("email", $user->email);
            $request->session()->put("username", $user->username);

            return redirect()->intended('/home');
        }

        return back()
            ->with("status", [
                "message" => "Login failed, dont panic and check your email or password.",
                "type" => "danger"
            ])
            ->withInput();
    }
}
