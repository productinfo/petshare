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
Route::get('login/{provider}', 'SocialLoginController@redirect');
Route::get('login/{provider}/callback','SocialLoginController@Callback');

Route::get('pets/search', 'PetController@search')->name('pets.search');
Route::post('pets/searchResults', 'PetController@searchResults')->name('pets.searchResults');
Route::resource('pets', 'PetController');
Route::resource('users', 'UserController');

Route::get('pay', 'PaymentController@pay')->name('pay');
Route::post('pay', 'PaymentController@processPay')->name('processPay');
Route::get('paysuccess', 'PaymentController@paySuccess')->name('paySuccess');

Route::get('/thanks', function() {
    return view('thanks');
});
