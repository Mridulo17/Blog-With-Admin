<?php

use Illuminate\Support\Facades\Route;

//User Routes

Route::group(['namespace' => 'App\Http\Controllers\User'],function(){
    Route::get('/','HomeController@index');
    Route::get('post/{post}','PostController@post')->name('post');

    Route::get('post/tag/{tag}','HomeController@tag')->name('tag');
    Route::get('post/category/{category}','HomeController@category')->name('category');
});


//Admin Routes

Route::group(['namespace' => 'App\Http\Controllers\Admin'],function(){

    Route::get('admin/home','HomeController@index')->name('admin.home');

    // User Routes
    Route::resource('admin/user','UserController');

    // Role Routes
    Route::resource('admin/permission','PermissionController');

    // Permission Routes
    Route::resource('admin/role','RoleController');

    // Post Routes
    Route::resource('admin/post','PostController');
    // Tag Routes
    Route::resource('admin/tag','TagController');
    // Category Route
    Route::resource('admin/category','CategoryController');
    // Admin Auth Routes
    Route::get('admin-login','Auth\LoginController@showLoginForm')->name('admin.login');
    Route::post('admin-login','Auth\LoginController@login');
    // Route::get('admin-logout','Auth\LoginController@logout');
    
});


 



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
