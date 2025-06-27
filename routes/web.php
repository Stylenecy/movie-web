<?php

use App\Http\Controllers\MenuController;
use App\Http\Controllers\PhotoController;
use Illuminate\Auth\Events\Login;

// Biar mulai dari catalog terus
Route::get('/', 'PhotoController@catalog')->name('home');

// Buat Guest
Route::group(['middleware' => ['guest']], function () {
    Route::get('/login', 'MenuController@login')->name('login');
    Route::post('/ceklogin', 'MenuController@ceklogin');
});

// Buat Aku~
Route::group(['middleware' => ['auth']], function () {
    Route::get('/home', 'MenuController@home');
    Route::get('/faq', 'MenuController@faq');
    Route::get('/ubahpass', 'MenuController@ubahpass');
    Route::post('/updatepass', 'MenuController@updatepass');
    Route::get('/logout', 'MenuController@logout');

    // Photo routes
    Route::get('/photos', 'PhotoController@index')->name('photos.index');
    Route::get('/photos/create', 'PhotoController@create')->name('photos.create');
    Route::post('/photos', 'PhotoController@store')->name('photos.store');
    Route::get('/photos/{photo}/edit', 'PhotoController@edit')->name('photos.edit');
    Route::put('/photos/{photo}', 'PhotoController@update')->name('photos.update');
    Route::delete('/photos/{photo}', 'PhotoController@destroy')->name('photos.destroy');

    Route::get('/profile', 'MenuController@profile')->name('profile.show');
    Route::post('/profile', 'MenuController@updateProfile')->name('profile.update');
});

// Public catalog route
Route::get('/catalog', 'PhotoController@catalog')->name('photos.catalog');
