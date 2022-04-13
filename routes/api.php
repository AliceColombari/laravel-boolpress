<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


//questo file è responsabile delle chiamate API di Laravel, le rotte qui dentro hanno prefisso /api

// /api/posts
Route::get('/posts', 'Api\PostController@index');

// /api/posts/*
Route::get('/posts/{slug}', 'Api\PostController@show');