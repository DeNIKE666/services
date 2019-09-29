<?php

Route::prefix('/')->namespace('Frontend')->group(function () {
    Route::get('/', 'FrontendController@index')->name('frontend.index');

    Route::prefix('category')->group(function () {
        Route::any('/{id?}', 'FrontendControllerCategories@show')->name('category.show');
    });

    Route::prefix('product')->group(function () {
        Route::get('/show/{productid}/' , 'UserProductController@show')->name('user.sell');
    });
});

Route::prefix('dashboard')->namespace('Dashboard')->middleware('auth')->group(function (){
    Route::get('/', 'DashboardController@index')->name('dashboard');

    Route::resource('service' ,'ServicesController');

    Route::prefix('account')->group(function () {
        Route::any('/profile' , 'ProfileController@index')->name('profile');
        Route::get('/logout', 'ProfileController@logout')->name('logout.dashboard');
    });
});

Route::prefix('admin')->namespace('Admin')->group(function () {
    Route::get('/', 'AdminController@index')->name('admin.index');
    Route::prefix('categories')->group(function () {
        Route::get('/removeAll', 'CategoriesController@removeAll')->name('removeAll');
        Route::get('/up/{id}', 'CategoriesController@up')->name('up');
        Route::get('/down/{id}', 'CategoriesController@down')->name('down');
        Route::get('/remove/{id}', 'CategoriesController@remove')->name('remove');
    });
    Route::resource('categories', 'CategoriesController')->except('delete');
});

Auth::routes();

Route::prefix('hash')->group(function() {
    Route::get('/', 'HashController@show');
});
