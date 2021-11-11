<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Categories;
use App\Models\Article as ModelsArticle;

use Illuminate\Http\Request;

class Articles extends Controller {
    
    protected $categories;

    public function __construct() {
        $this->categories = Categories::all();
    }


    public function articles_view(Request $request) {
        $articles = ModelsArticle::all();

        $data = [
            "articles" => $articles->where('published', true),
            "categories" => $this->categories,
            'user_information' => [
                "id" => $request->session()->get('user_id'),
                "email" => $request->session()->get('email'),
                "username" => $request->session()->get('username'),
            ]
        ];

        return view('articles', $data);
    }

    public function categories_view(Request $request, Categories $category) {
        $data = [
            "articles" => $category->articles->where('published', true),
            "categories" => $this->categories,
            'user_information' => [
                "id" => $request->session()->get('user_id'),
                "email" => $request->session()->get('email'),
                "username" => $request->session()->get('username'),
            ]
        ];
        
        return view('articles', $data);
    }

    public function author_view(Request $request, User $author) {
        $data = [
            "articles" => $author->articles->where('published', true),
            "categories" => $this->categories,
            'user_information' => [
                "id" => $request->session()->get('user_id'),
                "email" => $request->session()->get('email'),
                "username" => $request->session()->get('username'),
            ]
        ];

        return view('articles', $data);
    }

    public function search_view(Request $request) {
        $data = [
            "articles" => ModelsArticle::filter(request(['keywords', 'categories', 'author']))->get(),
            "categories" => $this->categories,
            "authors" => User::all(),
            'user_information' => [
                "id" => $request->session()->get('user_id'),
                "email" => $request->session()->get('email'),
                "username" => $request->session()->get('username'),
            ]
        ];

        return view('articles-search', $data);
    }
}
