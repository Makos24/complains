<?php
Route::group(
    [
        'prefix'        => 'admin',
        'as'            => 'admin.',
        // 'middleware'    => ['auth', 'role:admin']
    ],
    function () {
        route::get('/', 'AdminController@index')->name('index');
        route::get('/services', 'ServiceController@index')->name('services.index');
        route::get('/types', 'ServiceController@types')->name('services.types');
        route::get('/options', 'ServiceController@options')->name('services.options');
        route::get('/account', 'AdminController@account')->name('account');
        route::post('/account', 'AdminController@store')->name('account.store');
    }
);
