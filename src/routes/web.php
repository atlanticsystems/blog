<?php

Route::group(['prefix' => 'blog'], function () {
    Route::get('/', 'Atsys\Blog\Http\Controllers\Blog\PostsController@index');
    Route::get('{category_alias}', 'Atsys\Blog\Http\Controllers\Blog\CategoriesController@index');
    Route::get('{category_alias}/{post_alias}', 'Atsys\Blog\Http\Controllers\Blog\PostsController@show');
});

Route::group(['prefix' => 'admin', 'middleware' => ['web', 'auth']], function () {
    Route::resource('posts', 'Atsys\Blog\Http\Controllers\Admin\PostsController');
    Route::resource('post_categories', 'Atsys\Blog\Http\Controllers\Admin\PostCategoriesController');
});
