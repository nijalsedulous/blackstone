<?php

Route::get('/', 'HomeController@index')->name('home');
Route::get('properties', 'FrontController@properties')->name('properties');
Route::get('property/{id}', 'FrontController@property_details')->name('property_details');
Route::get('property/download_pdf/{id}', 'FrontController@download_pdf')->name('download_pdf');
Route::post('property/store_contacts', 'FrontController@store_contacts')->name('store_contacts');
Route::get('contact-us', 'PageController@contact_us')->name('countact-us');







Route::get('/test', function () {
    echo \Hash::make('blackstone');
});

Route::prefix('admin')->group(function () {

    Auth::routes();
    Route::group(['middleware' => array('auth')], function() {
        Route::get('properties/contacts', 'PropertyController@contacts')->name('properties.contacts');

        Route::resource('properties', 'PropertyController');
        Route::resource('settings', 'SettingController');
        Route::resource('social_media', 'SocialMediaController');
        Route::resource('services', 'ServiceController');
        Route::resource('banners', 'BannerController');
        Route::resource('categories', 'CategoryController');
        Route::resource('blogs', 'BlogController');
        Route::resource('clients', 'ClientController');





    });
});

