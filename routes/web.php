<?php

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


Auth::routes();

    Route::get('/home', 'HomeController@index')->name('home');


    Route::post('/statut/store',[
        'uses'=>'PublicationController@store',
        'as'=>'status.store'
    ]);
    Route::post('/blog/store',[
        'uses'=>'PublicationController@store',
        'as'=>'blog.store'
    ]);
    Route::post('/faq/store',[
        'uses'=>'FaqController@store',
        'as'=>'faq.store'
    ]);
    Route::post('/sondage/store',[
        'uses'=>'SondageController@store',
        'as'=>'sondage.store'
    ]);

    Route::get('/formation/{nom}',[
        'uses'=>'HomeController@modules',
        'as'=>'formation'
    ]);