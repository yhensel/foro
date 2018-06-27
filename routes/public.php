<?php

//Public routes

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('/posts/{post}', [
    'uses' => 'PostController@show',
    'as'   => 'posts.show',
]);
