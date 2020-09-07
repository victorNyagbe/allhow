<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', 'MainController@accueil')->name('visitors.home');

Route::get('en/home','MainController@home' )->name('visitors.english.home');

Route::group(['prefix' => 'admin'], function () {

    Route::get('dashboard', 'Administration\MainController@dashboard')->name('administration.dashboard');

    Route::get('videos', 'Administration\FichierController@index')->name('fichiers.index');

    Route::get('videos/insertion', 'Administration\FichierController@create')->name('fichiers.insertion');

    Route::post('videos', 'Administration\FichierController@store')->name('fichiers.store');

    Auth::routes();

    Route::get('/home', 'HomeController@index')->name('home');

});


