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

Route::get('/', 'App\Http\Controllers\ArticleController@all')->name('article.list');
Route::post('/api/create-articles', 'App\Http\Controllers\ArticleController@create')->name('article.create');
Route::get('/api/delete-articles', 'App\Http\Controllers\ArticleController@delete')->name('article.delete');
Route::get('/api/all', 'App\Http\Controllers\ArticleController@getArticlesApi')->name('article.all');
