<?php

use App\Http\Controllers\PageController;
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

Route::get('/', function () {
    return view('welcome');
});

/*
 * CRUD Articles
 */

Route::get('articles', 'App\Http\Controllers\ArticleController@index')
    ->name('articles.index');

Route::post('articles', 'App\Http\Controllers\ArticleController@store')
    ->name('articles.store');

Route::get('articles/create', 'App\Http\Controllers\ArticleController@create')
    ->name('articles.create');

Route::get('article/{id}', 'App\Http\Controllers\ArticleController@show')
    ->name('article.show');

Route::get('articles/{id}/edit', 'App\Http\Controllers\ArticleController@edit')
    ->name('articles.edit');

Route::patch('articles/{id}', 'App\Http\Controllers\ArticleController@update')
    ->name('articles.update');

Route::delete('articles/{id}', 'App\Http\Controllers\ArticleController@destroy')
    ->name('articles.destroy');

Route::resource('pages', PageController::class);
