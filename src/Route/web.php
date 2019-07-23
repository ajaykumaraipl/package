<?php

Route::get('test', function () {
    echo 'Hello User!';
});


Route::group(['middleware' => 'web'], function () {
    // Articles Routing
    Route::get('articles', 'ArticlesController@index');
    Route::get('article/edit/{id}', 'ArticlesController@edit');
    Route::get('article/create', 'ArticlesController@create');
    Route::get('article/delete/{id}', 'ArticlesController@delete');
    Route::get('article/publish/{id}', 'ArticlesController@publish');
    Route::get('article/unpublish/{id}', 'ArticlesController@unpublish');
    Route::get('article/duplicate/{id}', 'ArticlesController@duplicate');

    // Articles Post
    Route::post('article/save', 'ArticlesController@store');
    Route::post('article/update/{id}', 'ArticlesController@update');
    Route::post('articles/bulk/action', 'ArticlesController@bulkAction');


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
