<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class logout extends Controller {
    public function index(Request $request) {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerate();

        return redirect("/login");
    }
}
