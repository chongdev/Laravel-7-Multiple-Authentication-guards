<?php

use Illuminate\Support\Facades\Auth;
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

Auth::routes();

Route::group([
    'middleware' => ['auth'],
], function () {

    Route::get('/logout', 'Auth\LoginController@logout');

    Route::get('/', function () {
        return view('home');
    });

});

Route::prefix('/admin')->name('admin.')->namespace('Admin')->group(function(){

    Route::namespace('Auth')->group(function(){
        Route::get('/login','LoginController@showLoginForm')->name('login');
        Route::post('/login','LoginController@login');
        Route::get('/logout','LoginController@logout')->name('logout');
    });

    Route::group([
        'middleware' => ['auth:admin'],
    ], function () {

        Route::get('/', function () {
            return view('admin');
        });
    });
});


Route::prefix('/blogger')->name('blogger.')->namespace('Blogger')->group(function(){

    Route::namespace('Auth')->group(function(){
        Route::get('/login','LoginController@showLoginForm')->name('login');
        Route::post('/login','LoginController@login');
        Route::get('/logout','LoginController@logout')->name('logout');
    });

    Route::group([
        'middleware' => ['auth:blogger'],
    ], function () {

        Route::get('/', function () {
            return view('blogger');
        });
    });
});
