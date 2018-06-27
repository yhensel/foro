<?php

//Routes that requires authentication.

//Posts
Route::get('posts/create', [
    'uses' => 'PostController@create',
    'as'   => 'posts.create',
]);

Route::post('posts/create', [
    'uses' => 'PostController@store',
    'as'   => 'posts.store',
]);
