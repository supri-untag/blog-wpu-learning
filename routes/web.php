<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',[\App\Http\Controllers\HomeController::class,'index']);
Route::get('/about',[\App\Http\Controllers\HomeController::class,'aboutShow']);
Route::get('/dashboard',[\App\Http\Controllers\HomeController::class,'dashboardIndex'])->middleware('auth');
Route::get('/posts',[\App\Http\Controllers\PostController::class, 'index']);
Route::get('/p/{post:id}',[\App\Http\Controllers\PostController::class, 'single']);
Route::get('/cat/{category:slug}',[\App\Http\Controllers\CategoriesController::class, 'postCat']);
Route::get('/authors/{user:id}',[\App\Http\Controllers\PostController::class, 'authors']);
Route::get('/login', [\App\Http\Controllers\UserContoller::class,'login'])->middleware('guest')->name('login');
Route::post('/login', [\App\Http\Controllers\UserContoller::class,'loginPost'])->middleware('guest');
Route::post('/logout', [\App\Http\Controllers\UserContoller::class,'logout'])->middleware('auth');
Route::get('/register', [\App\Http\Controllers\UserContoller::class,'register']);
Route::post('/register', [\App\Http\Controllers\UserContoller::class,'registerPost']);
Route::resource('/dashboard/post', \App\Http\Controllers\DashboardPostController::class)->middleware('auth');
Route::get('/dashboard/posts/createSlug',[\App\Http\Controllers\DashboardPostController::class,'createSlug'])->middleware('auth');
Route::resource('/dashboard/category',\App\Http\Controllers\AdminCategoryController::class)->except('show')->middleware('auth');



