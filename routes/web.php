<?php

use App\Http\Controllers\MenuController;
use Illuminate\Auth\Events\Login;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::group(['middleware' => ['guest']], function () {
    route::get('/', 'MenuController@login')->name('login');
    Route::post('/ceklogin', 'MenuController@ceklogin');
    route::get('/searchmovie', 'MenuController@searchMovie');
    route::get('/actsearchmovie', 'MenuController@actSearchMovie');
});

Route::group(['middleware' => ['auth']], function () {
    route::get('/home', 'MenuController@home');
    route::get('/movie', 'MenuController@movie');
    route::get('/faq', 'MenuController@faq');
    route::get('/movie', 'MenuController@movie');
    route::get('/movie/form-movie', 'MenuController@addmovie');
    route::get('/kategori', 'MenuController@kategori');
    route::get('/genre', 'MenuController@genre');
    route::post('/save', 'MenuController@savemovie');
    Route::get('/movie/edit-movie/{id}', 'MenuController@editmovie');
    Route::put('/update/{id}', 'MenuController@updatemovie');
    Route::get('/delete/{id}', 'MenuController@deletemovie');
    Route::get('/ubahpass', 'MenuController@ubahpass');
    Route::post('/updatepass', 'MenuController@updatepass');
    Route::get('/logout', 'MenuController@logout');
});

// // Menampilkan form (GET)
// Route::get('/kategori/form', function () {
//     return view('kategoriForm');
// });

// // Menangani data form (POST)
// Route::post('/kategori/form', function (Illuminate\Http\Request $request) {
//     return redirect('/kategori/form')->with('data', $request->all());
// });
