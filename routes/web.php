<?php

Route::get('/', 'HomeController@index')->name('home');
Route::get('properties', 'FrontController@properties')->name('properties');
Route::get('property/{id}', 'FrontController@property_details')->name('property_details');
Route::get('property/download_pdf/{id}', 'FrontController@download_pdf')->name('download_pdf');




Route::get('/test', function () {
    echo \Hash::make('blackstone');
});

Route::prefix('admin')->group(function () {

    Auth::routes();
    Route::group(['middleware' => array('auth')], function() {
        Route::resource('properties', 'PropertyController');
    });
});

