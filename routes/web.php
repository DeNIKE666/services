<?php

Route::prefix('/')->namespace('Frontend')->group(function () {

    Route::get('/', 'FrontendController@index')->name('frontend.index');
    Route::get('/info', 'FrontendController@info')->name('frontend.info');

    Route::prefix('category')->group(function () {
        Route::any('/{id?}', 'FrontendControllerCategories@show')->name('category.show');
    });

    Route::prefix('product')->group(function () {
        Route::get('/show/{productid}/' , 'UserProductController@show')->name('user.sell');
    });
});

Route::prefix('dashboard')->namespace('Dashboard')->middleware('auth')->group(function (){

    Route::get('/', 'DashboardController@index')->name('dashboard');

    Route::prefix('/services')->group(function () {
        Route::get('/', 'ServicesController@index')->name('service.index');
        Route::get('/create', 'ServicesController@create')->name('service.create');
        Route::post('/store' , 'ServicesController@store')->name('service.store');
        Route::get('/edit/{id}' , 'ServicesController@edit')->name('service.edit');
        Route::post('/update/{id}' , 'ServicesController@update')->name('service.update');
        Route::get('/delete/{id}' , 'ServicesController@delete')->name('service.delete');
        Route::get('/deletes', 'ServicesController@deletes')->name('service.deletes');
        Route::get('/delete/file/{id}', 'ServicesController@removeFile')->name('service.remove.file');
    });

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