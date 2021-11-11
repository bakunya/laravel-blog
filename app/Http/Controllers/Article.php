<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Article as ModelsArticle;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class Article extends Controller {
    protected $categories;

    public function __construct() {
        $this->categories = Categories::all();
    }

    /**
     * Handle routing view
     */

    public function slug_view(Request $request, ModelsArticle $article) {
        if($article->published || $article->user_id === $request->session()->get('user_id')) {
            $data = [
                "author" => $article->author,
                "category" => $article->category,
                "categories" => $this->categories,
                "article" => $article,
                'user_information' => [
                    "id" => $request->session()->get('user_id'),
                    "email" => $request->session()->get('email'),
                    "username" => $request->session()->get('username'),
                ]
            ];

            return view('article', $data);
        }
        
        return abort(404);
    }

    public function create_view(Request $request) {
        $data = [
            "categories" => $this->categories,
            'user_information' => [
                "id" => $request->session()->get('user_id'),
                "email" => $request->session()->get('email'),
                "username" => $request->session()->get('username'),
            ]
        ];

        return view('create-article', $data);
    }

    public function edit_view(Request $request, ModelsArticle $article) {
        if($article->user_id === $request->session()->get('user_id')) {
            $data = [
                "article" => $article,
                "categories" => $this->categories,
                'user_information' => [
                    "id" => $request->session()->get('user_id'),
                    "email" => $request->session()->get('email'),
                    "username" => $request->session()->get('username'),
                ]
            ];

            return view('edit-article', $data);
        }

        return abort(404);
    }

    /**
     * End handle routing view
     */

    
    public function create(Request $request) {
        $credentials = $request->validate([
            "title" => "required",
            "content" => "required",
            "category_id" => "required",
            "slug" => "required|unique:articles,slug"
        ]);

        $article = ModelsArticle::create([
            "user_id" => $request->session()->get('user_id'),
            "title" => $credentials['title'],
            "content" => $credentials['content'],
            "image_url" => $credentials['image_url'] ?? 'https://images.unsplash.com/photo-1605379399642-870262d3d051?ixid=MnwxMjA3fDB8MHxzZWFyY2h8MXx8cHJvZ3JhbW1pbmd8ZW58MHx8MHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60',
            "category_id" => $credentials['category_id'],
            "slug" => $credentials['slug'],
        ]);

        return back()->with("status", [
            "message" => "Create " . $credentials["title"] . " article is successfully.",
            "type" => "success"
        ]);
    }

    public function edit(Request $request) {
        $credentials = $request->validate([
            "id" => 'required',
            "title" => "required",
            "content" => "required",
            "category_id" => "required",
            'image_url' => 'url',
            "slug" => [
                'required',
                Rule::unique('articles', 'slug')->ignore($request['id'])
            ]
        ]);

        ModelsArticle::where([
                'user_id' => $request->session()->get('user_id'),
                'id' => $credentials['id']
            ])
                ->update([
                    'title' => $credentials['title'],
                    'content' => $credentials['content'],
                    'slug' => $credentials['slug'],
                    'category_id' => $credentials['category_id'],
                    'image_url' => $credentials['image_url'],
                ]);
        
        return redirect('home')->with('status', [
            "message" => "Success update article.",
            "type" => "success"
        ]);
    }

    public function publish(Request $request) {
        $credentials = $request->validate([
            "id" => 'required',
        ]);

        $article = ModelsArticle::find($credentials['id']);
        $article->published = true;
        $article->save();

        return redirect('home')->with('status', [
            "message" => "Success publish article.",
            "type" => "success"
        ]);
    }

    public function unpublish(Request $request) {
        $credentials = $request->validate([
            "id" => 'required',
        ]);

        $article = ModelsArticle::find($credentials['id']);
        $article->published = false;
        $article->save();

        return redirect('home')->with('status', [
            "message" => "Success unpublish article.",
            "type" => "success"
        ]);
    }

    public function delete(Request $request) {
        $credentials = $request->validate([
            "id" => 'required',
        ]);

        $article = ModelsArticle::find($credentials['id']);
        $article->delete();

        return redirect('home')->with('status', [
            "message" => "Success delete article.",
            "type" => "success"
        ]);
    }
}

