<?php

use App\Http\Controllers\Article;
use App\Http\Controllers\Articles;
use App\Http\Controllers\Create;
use App\Http\Controllers\Home;
use App\Http\Controllers\Login;
use App\Http\Controllers\logout;
use App\Http\Controllers\Publish;
use App\Http\Controllers\Register;

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});



/**
 * Route for LOGIN request
 */
Route::get("/login", [ Login::class, 'login_view' ])->name('login')->middleware('guest');

Route::post("/login", [ Login::class, 'authenticate' ]);



/**
 * Route for REGISTER request
 */
Route::get("/register", [ Register::class, 'register_view' ])->middleware('guest');

Route::post("/register", [ Register::class, 'authenticate' ]);



/**
 * Route for ARTICLES request
 */
Route::get("/articles", [ Articles::class, 'articles_view' ])->middleware('auth');
Route::get("/articles/author/{author:username}", [ Articles::class, 'author_view' ])->middleware('auth');
Route::get("/articles/categories/{category:slug}", [ Articles::class, 'categories_view' ])->middleware('auth');
Route::get("/articles/search", [ Articles::class, 'search_view' ])->middleware('auth');



/**
 * Route for ARTICLE request
 */
Route::get("/article/{article:slug}", [ Article::class, 'slug_view' ])->middleware('auth');
Route::get("/article/action/create", [ Article::class, 'create_view' ])->middleware('auth');
Route::get("/article/action/edit/{article:id}", [ Article::class, 'edit_view' ])->middleware('auth');

Route::post("/article", [ Article::class, 'create' ])->middleware('auth');

Route::put("/article", [ Article::class, 'edit' ])->middleware('auth');
Route::put("/article/publish", [ Article::class, 'publish' ])->middleware('auth');
Route::put("/article/unpublish", [ Article::class, 'unpublish' ])->middleware('auth');

Route::delete("/article", [Article::class, 'delete']);


/**
 * Route for HOME request
 */
Route::get("/home", [ Home::class, 'index' ])->middleware('auth');


/**
 * Route for LOGOUT request
 */
Route::get("/logout", [ logout::class, 'index' ])->middleware('auth');
