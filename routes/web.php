<?php

Route::get('/', 'HomeController@index')->name('home');
Route::get('properties', 'FrontController@properties')->name('properties');
Route::get('properties/{slug_name}', 'FrontController@properties')->name('properties');

Route::get('property/{slug_name}', 'FrontController@property_details')->name('property_details');
Route::get('property/download_pdf/{id}', 'FrontController@download_pdf')->name('download_pdf');
Route::post('property/store_contacts', 'FrontController@store_contacts')->name('store_contacts');
Route::post('contact/save_contact', 'FrontController@save_contact')->name('save_contact');

Route::get('contact-us', 'PageController@contact_us')->name('contact-us');
Route::get('about-us', 'PageController@about_us')->name('about-us');
Route::get('thank-you', 'PageController@thank_you')->name('thank-you');


Route::get('blog', 'FrontController@blog')->name('blog');
Route::get('blog/{slug_name}', 'FrontController@blog_details')->name('blog_details');
Route::get('blog/category/{slug_name}', 'FrontController@category_blog')->name('category_blog');




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
        Route::post('/search_contact','ContactController@searchContact')->name('contacts.search_contact');
        Route::post('/property_search_contact','PropertyController@searchContact')->name('properties.property_search_contact');
        Route::delete('/delete_contact/{id}','PropertyController@delete_contact')->name('properties.delete_contact');
        Route::post('/search_property','PropertyController@index')->name('properties.search_property');
        Route::get('/properties/delete_property_image/{property_id}/{image_id}', 'PropertyController@deletePropertyImage')->name('properties.delete_image');


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
        Route::resource('teams', 'TeamController');


    });
});

