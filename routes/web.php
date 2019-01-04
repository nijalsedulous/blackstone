<?php

Route::get('/', 'HomeController@index')->name('home');
Route::get('properties', 'FrontController@properties')->name('properties');
Route::get('property/{id}', 'FrontController@property_details')->name('property_details');
Route::get('property/download_pdf/{id}', 'FrontController@download_pdf')->name('download_pdf');
Route::post('property/store_contacts', 'FrontController@store_contacts')->name('store_contacts');
Route::post('contact/save_contact', 'FrontController@save_contact')->name('save_contact');

Route::get('contact-us', 'PageController@contact_us')->name('contact-us');
Route::get('blog', 'FrontController@blog')->name('blog');
Route::get('blog/{id}', 'FrontController@blog_details')->name('blog_details');



Route::get('/test', function () {
    echo \Hash::make('blackstone');
});

Route::prefix('admin')->group(function () {

    Auth::routes();
    Route::group(['middleware' => array('auth')], function() {
        Route::get('properties/contacts', 'PropertyController@contacts')->name('properties.contacts');
        Route::get('/profile/{id}', 'UserController@profile')->name('admin.profile');
        Route::put('/profile/{id}', 'UserController@update_profile');
        Route::get('/change_password', 'UserController@change_password')->name('admin.change_password');
        Route::put('/update_password/{user_id}', 'UserController@updatePassword');

        Route::resource('properties', 'PropertyController');
        Route::resource('settings', 'SettingController');
        Route::resource('social_media', 'SocialMediaController');
        Route::resource('services', 'ServiceController');
        Route::resource('banners', 'BannerController');
        Route::resource('categories', 'CategoryController');
        Route::resource('blogs', 'BlogController');
        Route::resource('clients', 'ClientController');
        Route::resource('navigations', 'NavigationController');
        Route::resource('contacts', 'ContactController');
        Route::resource('pages', 'AdminPageController');

    });
});

