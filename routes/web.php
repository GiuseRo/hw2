<?php

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

Route::get("/login","App\Http\Controllers\LoginController@login")->name('login');
Route::post("/login", "App\Http\Controllers\LoginController@checkLogin");
Route::get("/logout", "App\Http\Controllers\LoginController@logout")->name("logout");

Route::get('/register', 'App\Http\Controllers\RegisterController@index')->name('register');
Route::post('/register', 'App\Http\Controllers\RegisterController@registrazione');
Route::get('/register/username/{q}','App\Http\Controllers\RegisterController@checkUsername');
Route::get('/register/email/{query}',"App\Http\Controllers\RegisterController@checkEmail");

Route :: get('/home','App\Http\Controllers\HomeController@index')->name('home');
Route :: post('/home/crea','App\Http\Controllers\HomeController@salva');
Route :: get('/home/tempo/{q}','App\Http\Controllers\HomeController@tempo');

Route::get('/posts', "App\Http\Controllers\FeedController@feed")->name('posts');

Route :: get('/like/{q}',"App\Http\Controllers\LikeController@like");

Route::get('/preferito',"App\Http\Controllers\FavoriteController@index")->name('preferito');
Route:: get('/favorite/{q}',"App\Http\Controllers\FavoriteController@preferito");
