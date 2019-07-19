<?php

Route::get('test', function () {
    echo 'Hello User!';
});


Route::group(['middleware' => 'web'], function () {
    // News Routing
    Route::get('news', 'ArticlesController@index');
    Route::get('news/edit/{id}', 'ArticlesController@edit');
    Route::get('news/create', 'ArticlesController@create');
    Route::get('news/delete/{id}', 'ArticlesController@delete');
    Route::get('news/publish/{id}', 'ArticlesController@publish');
    Route::get('news/unpublish/{id}', 'ArticlesController@unpublish');
    Route::get('news/duplicate/{id}', 'ArticlesController@duplicate');

    // News Post
    Route::post('news/save', 'ArticlesController@store');
    Route::post('news/update/{id}', 'ArticlesController@update');


    // Categories Routing
    Route::get('categories', 'CategoriesController@index');
    Route::get('categories/edit/{id}', 'CategoriesController@edit');
    Route::get('categories/create', 'CategoriesController@create');
    Route::get('categories/delete/{id}', 'CategoriesController@delete');

    // Categories Post
    Route::post('categories/save', 'CategoriesController@store');
    Route::post('categories/edit/{id}', 'CategoriesController@update');


    // Tags Routing
    Route::get('tags', 'TagsController@index');
    Route::get('tags/edit/{id}', 'TagsController@edit');
    Route::get('tags/create', 'TagsController@create');
    Route::get('tags/delete/{id}', 'TagsController@delete');

    // Tags Post
    Route::post('tags/save', 'TagsController@store');
    Route::post('tags/edit/{id}', 'TagsController@update');
});
