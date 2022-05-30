<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', 'API\ApiInfoController@index');
Route::post('auth/issue', 'API\AuthController@login');
Route::post('register', 'API\AuthController@register');
Route::get('categories', 'API\PostController@listCategories');
Route::get('posts', 'API\PostController@listAllPosts');
Route::get('posts/category/{category}', 'API\PostController@postByCategory');
Route::get('posts/headline/{true}', 'API\PostController@postHeadline');


Route::post('/alumni/register', 'API\AlumniController@store');

// Route::group(['prefix' => 'data'], function () {
//     Route::group(['prefix' => 'alumni'], function () {
//         Route::get('/', 'API\AlumniController@index');
//         Route::get('/search', 'API\AlumniController@search');
//     });
//     Route::group(['prefix' => 'teacher'], function () {
//         Route::get('/', 'API\TeacherController@index');
//         Route::get('/search', 'API\TeacherController@search');
//     });
//     Route::group(['prefix' => 'galery'], function () {
//         Route::get('/', 'API\GaleryController@index');
//     });
    

    
// });

// Route::group(['middleware' => 'auth:api'], function(){
//     Route::post('details', 'API\AuthController@details');
//     // alumni data
//     Route::group(['prefix' => 'alumni'], function () {
//         Route::get('/', 'API\AlumniController@index');
//         Route::post('/', 'API\AlumniController@store');
//     });
// });
