<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::group(['prefix' => 'admin', 'middleware'=>'auth.checkrole'], function(){


    Route::get('categories', ['as' => 'admin.categories.index', 'uses' => 'CategoriesController@index']);
    Route::get('categories/create', ['as'=>'admin.categories.create', 'uses' => 'CategoriesController@create']);
    Route::get('categories/edit/{id}', ['as'=>'admin.categories.edit', 'uses' => 'CategoriesController@edit']);
    Route::post('categories/update/{id}', ['as'=>'admin.categories.update', 'uses' => 'CategoriesController@update']);
    Route::post('categories/store', ['as'=>'admin.categories.store', 'uses' => 'CategoriesController@store']);
    Route::get('categories/destroy/{id}', ['as'=>'admin.categories.destroy', 'uses' => 'CategoriesController@destroy']);



    Route::get('products', ['as' => 'admin.products.index', 'uses' => 'ProductsController@index']);
    Route::get('products/create', ['as'=>'admin.products.create', 'uses' => 'ProductsController@create']);
    Route::get('products/edit/{id}', ['as'=>'admin.products.edit', 'uses' => 'ProductsController@edit']);
    Route::post('products/update/{id}', ['as'=>'admin.products.update', 'uses' => 'ProductsController@update']);
    Route::post('products/store', ['as'=>'admin.products.store', 'uses' => 'ProductsController@store']);
    Route::get('products/destroy/{id}', ['as'=>'admin.products.destroy', 'uses' => 'ProductsController@destroy']);

});