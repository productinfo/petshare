<?php

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
    if (Auth::check()) {
        return redirect('/users/' . auth()->user()->id);
    } else {
        return view('index');
    }
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/thanks', function() {
    return view('thanks');
});
Route::get('pets/search', 'PetController@search')->name('pets.search');
Route::post('pets/searchResults', 'PetController@searchResults')->name('pets.searchResults');
Route::resource('pets', 'PetController');
Route::resource('users', 'UserController');
