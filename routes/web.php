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
    return view('welcome');
});

Route::get('/account', function () {
    return view('account.account');
});

Route::get('/account/edit', function () {
    return view('account.accountEdit');
})->name('account.edit');

Route::get('/account/password', function () {
    return view('account.accountPassword');
})->name('account.password');

Route::put('/account/update', 'HomeController@accountUpdate')->name('account.update');
Route::put('/account/password', 'HomeController@accountPassword')->name('account.password');

Route::get('/verify', 'HomeController@verify')->name('verify');
Route::get('/friends', 'HomeController@friends')->name('friends');
Route::get('/friends/{nim}', 'HomeController@nim')->name('nim');

Route::resource('/post', 'PostController');

Route::post('/post/broadcast','PostController@broadcast')->name('post.broadcast');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home/json', 'HomeController@json')->name('json');
Route::get('/about', 'HomeController@about')->name('about');

Route::get('/api', 'HomeController@api')->name('api');