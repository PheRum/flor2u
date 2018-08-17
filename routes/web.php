<?php

Route::get('/', 'OrderController@index')->name('home');

/**
 * Orders
 */
Route::group(['prefix' => 'order'], function () {
    Route::get('current', 'OrderController@current')->name('order.current');
    Route::get('new', 'OrderController@new')->name('order.new');
    Route::get('outdated', 'OrderController@outdated')->name('order.outdated');
    Route::get('completed', 'OrderController@completed')->name('order.completed');

    Route::get('/', 'OrderController@index')->name('order.index');
    Route::get('{id}', 'OrderController@show')->name('order.show');
    Route::get('{id}/edit', 'OrderController@edit')->name('order.edit');
    Route::put('{id}', 'OrderController@update')->name('order.update');
});

/**
 * Products
 */
Route::group(['prefix' => 'product'], function () {
    Route::get('/', 'ProductController@index')->name('product.index');
    Route::get('{id}', 'ProductController@show')->name('product.show');
    Route::put('{id}', 'ProductController@update')->name('product.update');
});
