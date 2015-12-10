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

Route::get('/', function(){
   return view('welcome');
});

//Route::get('/home', function(){
//    return view('welcome');
//});


Route::group(['prefix' => 'admin', 'middleware'=>'auth.checkrole:admin'], function(){
    Route::get('/', ['as' => 'admin.categories.index', 'uses' => 'CategoriesController@index']);

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


    Route::get('clients', ['as' => 'admin.clients.index', 'uses' => 'ClientsController@index']);
    Route::get('clients/create', ['as'=>'admin.clients.create', 'uses' => 'ClientsController@create']);
    Route::get('clients/edit/{id}', ['as'=>'admin.clients.edit', 'uses' => 'ClientsController@edit']);
    Route::post('clients/update/{id}', ['as'=>'admin.clients.update', 'uses' => 'ClientsController@update']);
    Route::post('clients/store', ['as'=>'admin.clients.store', 'uses' => 'ClientsController@store']);
    Route::get('clients/destroy/{id}', ['as'=>'admin.clients.destroy', 'uses' => 'ClientsController@destroy']);


    Route::get('orders', ['as' => 'admin.orders.index', 'uses' => 'OrdersController@index']);
    Route::get('orders/edit/{id}', ['as' => 'admin.orders.edit', 'uses' => 'OrdersController@edit']);
    Route::post('orders/update/{id}', ['as' => 'admin.orders.update', 'uses' => 'OrdersController@update']);

    Route::get('cupoms', ['as' => 'admin.cupoms.index', 'uses' => 'CupomsController@index']);
    Route::get('cupoms/create', ['as'=>'admin.cupoms.create', 'uses' => 'CupomsController@create']);
    Route::post('cupoms/store', ['as'=>'admin.cupoms.store', 'uses' => 'CupomsController@store']);
    Route::get('cupoms/edit/{id}', ['as' => 'admin.cupoms.edit', 'uses' => 'CupomsController@edit']);
    Route::post('cupoms/update/{id}', ['as' => 'admin.cupoms.update', 'uses' => 'CupomsController@update']);
    Route::get('cupoms/destroy/{id}', ['as'=>'admin.cupoms.destroy', 'uses' => 'CupomsController@destroy']);
});


#Route::group(['prefix'=>'customer', 'middleware'=>'auth.checkrole:client', 'as'=>'customer.'], function(){
Route::group(['prefix'=>'customer',  'as'=>'customer.'], function(){

    route::get('order', ['as'=>'order.index', 'uses'=>'CheckoutController@index']);
    route::get('order/create', ['as'=>'order.create', 'uses'=>'CheckoutController@create']);
    route::post('order/store', ['as'=>'order.store', 'uses'=>'CheckoutController@store']);
});


Route::post('oauth/access_token', function() {
    return Response::json(Authorizer::issueAccessToken());
});


Route::group(['prefix' => 'api', 'middleware'=>'oauth', 'as'=>'api.'], function() {

    Route::group(['prefix' => 'client', 'middleware'=>'oauth.checkrole:client', 'as'=>'client.'], function() {

        Route::get('user/authenticated', 'UserController@authenticated');

        Route::resource('order',
            'Api\Client\ClientCheckoutController', [
                'except' => ['create', 'edit', 'destroy']
        ]);

    });


    Route::group(['prefix' => 'deliveryman', 'middleware'=>'oauth.checkrole:deliveryman', 'as'=>'deliveryman.'], function() {

        Route::get('pedidos', function(){
            return [
                'id' => 1,
                'client' => 'Jefferson - Entregador',
                'total' => 10
            ];
        });
    });


    Route::get('pedidos', function(){
       return [
        'id' => 1,
        'client' => 'Jefferson',
        'total' => 10
       ];
    });

    route::get('teste', function (){
        return ['API Rodando!'];
    });


});

