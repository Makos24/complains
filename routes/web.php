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
    return redirect('/home');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(
    [
        'prefix'        => 'complains',
        'as'            => 'complains.',
        'middleware'    => ['auth']
    ],
    function () {
        route::get('/', 'ComplainsController@index')->name('index');
        route::get('/pending', 'ComplainsController@pending')->name('pending');
        route::get('/resolved', 'ComplainsController@resolved')->name('resolved');
        route::get('/print/{complain}', 'ComplainsController@print')->name('print');
    }
);
