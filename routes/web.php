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
    Route::get('/publication/{id}',[
        'uses'=>'HomeController@destroy',
        'as'=>'publication.destroy'
    ]);

   Route::post('/jaime/{id}',[
        'uses'=>'LikeController@jaime'
    ]);

    Route::get('/unjaime/{id}',[
        'uses'=>'LikeController@unjaime'
    ]);

    Route::get('/getAllPublication/{id}',[
        'uses'=>'PublicationController@getAllPublication',
        
    ]);

    Route::get('/reclamation',[
        'uses'=>'ReclamationController@index',
        'as'=>'reclamation.index'
    ]);

    Route::post('/reclamation/store',[
        'uses'=>'ReclamationController@store',
        
    ]);
    Route::get('/profile/{id}',[
        'uses'=>'ProfileController@profile',
        
    ]);

    Route::post('/commenter',[
        'uses'=>'commentaireController@store'
    ]);

    Route::get("/allcomment/{id}",[
        'uses'=>'commentaireController@allcomment'
    ]);

    Route::get("/download/{id}",[
        'uses'=>'HomeController@download',
        'as'=>'file.download'
    ]);