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

Route::get('contact', 'MainController@contact')->name('visitors.contact');

Route::post('contact', 'MainController@contactUs')->name('visitors.contactUs');

Route::get('a-propos', 'MainController@about')->name('visitors.about');

Route::post('rechercher-fichiers', 'MainController@search')->name('visitors.search');

Route::group(['prefix' => 'admin'], function () {

    Route::get('dashboard', 'Administration\MainController@dashboard')->name('administration.dashboard');

    Route::get('videos', 'Administration\FichierController@index')->name('fichiers.index');

    Route::get('videos/insertion', 'Administration\FichierController@create')->name('fichiers.insertion');

    Route::post('videos', 'Administration\FichierController@store')->name('fichiers.store');

    Route::get('video/{fichier}/edition', 'Administration\FichierController@edit')->name('fichiers.edition');

    Route::patch('video/{fichier}', 'Administration\FichierController@update')->name('fichiers.update');

    Route::delete('video/{fichier}/suppression', 'Administration\FichierController@destroy')->name('fichiers.destroy');

    Route::post('register-admin', 'Administration\RegisterAdminController@registration')->name('admin.auth.registration');

    Auth::routes();

    Route::get('/home', 'HomeController@index')->name('home');

});


