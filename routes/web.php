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

Route::get('/', 'ArticlesController@index')->name('index');
Route::get('/article/{slug}', 'ArticlesController@show')->name('article');
Route::get('/tag/{tag}', 'TagsController@show')->name('tag');
Route::get('/category/{category}', 'CategoryController@show')->name('category');
Route::get('/venue/{venue}', 'VenueController@show')->name('venue');

Auth::routes();

// Grouped routes: Auth Backend
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', 'DashboardController@index')
        ->name('dashboard');

    // Articles
    // Display
    Route::get('/dashboard/articles', 'BackendArticlesController@index')
        ->name('dashboard.articles');
    Route::get('/dashboard/articles/all', 'BackendArticlesController@index_all')
        ->name('dashboard.articles.all');
    // Create
    Route::get('/dashboard/articles/create', 'BackendArticlesController@create')
        ->name('dashboard.articles.create');
    // Store (save & post article)
    Route::post('/dashboard/articles', 'BackendArticlesController@store')
        ->name('dashboard.articles.store');
    // Edit
    Route::get('/dashboard/articles/edit/{slug}', 'BackendArticlesController@edit')
        ->name('dashboard.articles.edit');
    // Update (make changes)
    Route::patch('dashboard/articles/{slug}', 'BackendArticlesController@update')
        ->name('dashboard.articles.update');
    // Delete
    Route::delete('/dashboard/articles/{slug}', 'BackendArticlesController@destroy')
        ->name('dashboard.articles.delete');
});

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});
