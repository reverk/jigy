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
    // Main Page
    Route::get('/dashboard', 'DashboardController@index')
        ->name('dashboard');

    // Profile
    // Display
    Route::get('/dashboard/profile', 'ProfileController@index')
        ->name('dashboard.profile');
    // Update
    Route::patch('dashboard/profile/{id}', 'ProfileController@update')
        ->name('dashboard.profile.update');
    // Delete
    Route::delete('dashboard/profile/{id}', 'ProfileController@destroy')
        ->name('dashboard.profile.delete');

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

    // Grouped routes: Users that are allowed to manage taxonomies
    Route::group(['middleware' => ['can:manage taxonomies']], function () {
        // Tags & Categories view
        Route::get('/dashboard/taxonomy', 'BackendTaxonomyController@index')
            ->name('dashboard.taxonomy');

        // Tag(s)
        // Create
        Route::get('dashboard/tag/create', 'TagsController@create')
            ->name('dashboard.tag.create');
        // Store (save tag)
        Route::post('dashboard/tag/', 'TagsController@store')
            ->name('dashboard.tag.store');
        // Edit
        Route::get('dashboard/tag/edit/{slug}', 'TagsController@edit')
            ->name('dashboard.tag.edit');
        // Update (make changes)
        Route::patch('dashboard/tag/{slug}', 'TagsController@update')
            ->name('dashboard.tag.update');
        // Delete
        Route::delete('dashboard/tag/{slug}', 'TagsController@destroy')
            ->name('dashboard.tag.delete');

        // Category(-ies)
        // Create
        Route::get('dashboard/category/create', 'CategoryController@create')
            ->name('dashboard.category.create');
        // Store (save category)
        Route::post('dashboard/category/', 'CategoryController@store')
            ->name('dashboard.category.store');
        // Edit
        Route::get('dashboard/category/edit/{slug}', 'CategoryController@edit')
            ->name('dashboard.category.edit');
        // Update (make changes)
        Route::patch('dashboard/category/{slug}', 'CategoryController@update')
            ->name('dashboard.category.update');
        // Delete
        Route::delete('dashboard/category/{slug}', 'CategoryController@destroy')
            ->name('dashboard.category.delete');
    });
});

// File manager
Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});
