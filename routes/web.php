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

    Route::prefix('user')->group(function () {
        Route::get('/{login}', 'UserController@showSeller')->name('show.seller');
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
        Route::any('/delete/file/{id}', 'ServicesController@removeFile')->name('service.remove.file');
    });

    Route::prefix('account')->group(function () {
        Route::get('/profile' , 'ProfileController@index')->name('profile');
        Route::post('/update' , 'ProfileController@update')->name('profile.update');
        Route::get('/logout', 'ProfileController@logout')->name('logout.dashboard');
    });

    Route::prefix('order')->group(function () {
        Route::get('/service/{id}' , 'OrderController@order')->name('order.create');
        Route::get('/open/{id}' , 'OrderController@complete')->name('order.buy.complete');
        Route::get('/lists/orders' , 'OrderController@listsOrderBuyed')->name('order.lists.buyed');
        Route::get('/lists/selled' , 'OrderController@listsOrderSeller')->name('order.lists.seller');
        Route::post('/review/{id}' , 'OrderController@review')->name('order.review');
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