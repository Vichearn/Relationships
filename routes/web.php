<?php

Route::get('/', function () {
    return view('home');
});

Route::get('/home', 'HomeController@index')->name('welcome');

Route::get('change/{locale}', function ($locale) {
	Session::put('locale', $locale); 
	return Redirect::back();
});

Auth::routes();

Route::group(['middleware' => 'is_admin'], function () {
    Route::prefix('admin')->group(function () {
        Route::get('/dashboard', 'AdminController@dashboard');
        Route::get('/setting', 'AdminController@setting');

        //Products Routes (Admin)
        Route::resource('/products', 'ProductsController');

        //Categories Routes (Admin)
        Route::resource('/categories', 'CategoriesController');
    });
});

//Product Index Routes
Route::get('products', 'ProductsController@products')->name('products');

//Product Search Routes
Route::get('products/searchProduct', 'ProductsController@search')->name('searchProduct');

//Product Show Routes
Route::get('products/productShow/{id}', 'ProductsController@productShow')->name('productShow');

//Product Search Routes
Route::get('products/findCate', 'ProductsController@findCate')->name('findCate');

//Product Category Routes
Route::get('products/findPc', 'ProductsController@findPc')->name('findPc');
Route::get('products/findNotebook', 'ProductsController@findNotebook')->name('findNotebook');
Route::get('products/findPhone', 'ProductsController@findPhone')->name('findPhone');
Route::get('products/findTablet', 'ProductsController@findTablet')->name('findTablet');