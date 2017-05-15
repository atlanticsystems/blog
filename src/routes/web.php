<?php

Route::group(['prefix' => 'blog'], function () {
    Route::get('/', 'Atsys\Blog\Http\Controllers\BlogController@index');
});

Route::group(['prefix' => 'admin'], function () {
    Route::resource('posts', 'Atsys\Blog\Http\Controllers\PostsController');
    Route::resource('post_categories', 'Atsys\Blog\Http\Controllers\PostCategoriesController');
});
