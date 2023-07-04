<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::group(['namespace' => 'App\Http\Controllers'], function () {


    Route::group(['namespace' => 'Web'], function () {

        Route::get('home', 'HomeController')->name('home');
        Route::get('', 'MainController@index')->name('main.index');
        Route::get('vue', 'VueController@index')->name('vue.index');
        Route::get('vue/lists', 'VueController@lists')->name('vue.lists');
        Route::get('vue/component', 'VueController@component')->name('vue.component');

        Route::group(['namespace' => 'Book', 'prefix' => 'books'], function () {
            Route::get('', 'IndexController')->name('book.index');
            Route::get('{book}', 'ShowController')->name('book.show');
        });

        Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => 'admin'], function () {
            Route::group(['namespace' => 'Book', 'prefix' => 'book'], function () {
                Route::get('', 'IndexController')->name('admin.book.index');
                Route::get('{book}/edit', 'EditController')->name('admin.book.edit');
                Route::patch('{book}', 'UpdateController')->name('admin.book.update');
                Route::delete('{book}', 'DestroyController')->name('admin.book.destroy');
                Route::get('create', 'CreateController')->name('admin.book.create');
                Route::post('', 'StoreController')->name('admin.book.store');
                Route::put('import', 'ImportController')->name('admin.book.import');
            });
        });

    });
});

Auth::routes();

