<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Http\Request;

class Create extends Controller {
    public function article(Request $request) {
        $categories = Categories::all();

        $data = [
            "categories" => $categories,
            'user_information' => [
                "id" => $request->session()->get('user_id'),
                "email" => $request->session()->get('email'),
                "username" => $request->session()->get('username'),
            ]
        ];

        return view('create-article', $data);
    }
}
