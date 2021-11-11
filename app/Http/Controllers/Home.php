<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Categories;
use Illuminate\Http\Request;

class Home extends Controller {
    public function index(Request $request) {
        $categories = Categories::all();
        $published_articles = Article::where("user_id", $request->session()->get('user_id'))->where('published', true)->get();
        $unpublished_articles = Article::where("user_id", $request->session()->get('user_id'))->where('published', false)->get();

        $data = [
            "published_articles" => $published_articles,
            "unpublished_articles" => $unpublished_articles,
            "categories" => $categories,
            'user_information' => [
                "id" => $request->session()->get('user_id'),
                "email" => $request->session()->get('email'),
                "username" => $request->session()->get('username'),
            ]
        ];

        return view('home', $data);
    }
}
