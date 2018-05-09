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

Route::post('/statut/store', [
    'uses' => 'PublicationController@store',
    'as' => 'status.store',
]);
Route::post('/blog/store', [
    'uses' => 'PublicationController@store',
    'as' => 'blog.store',
]);
Route::post('/faq/store', [
    'uses' => 'FaqController@store',
    'as' => 'faq.store',
]);
Route::post('/sondage/store', [
    'uses' => 'SondageController@store',
    'as' => 'sondage.store',
]);

Route::get('/formation/{nom}', [
    'uses' => 'HomeController@modules',
    'as' => 'formation',
]);
Route::get('/publication/{id}', [
    'uses' => 'HomeController@destroy',
    'as' => 'publication.destroy',
]);

Route::post('/jaime/{id}', [
    'uses' => 'LikeController@jaime',
]);

Route::get('/unjaime/{id}', [
    'uses' => 'LikeController@unjaime',
]);

Route::get('/getAllPublication/{id}', [
    'uses' => 'PublicationController@getAllPublication',

]);

Route::get('/reclamation', [
    'uses' => 'ReclamationController@index',
    'as' => 'reclamation.index',
]);

Route::post('/reclamation/store', [
    'uses' => 'ReclamationController@store',

]);
Route::get('/profile/{id}', [
    'uses' => 'ProfileController@profile',
    'as' => 'user.profile',

]);

Route::post('/commenter', [
    'uses' => 'commentaireController@store',
]);

Route::get("/allcomment/{id}", [
    'uses' => 'commentaireController@allcomment',
]);

Route::get("/download/{id}", [
    'uses' => 'HomeController@download',
    'as' => 'file.download',
]);

Route::post('jaimeCommentaire/{id}', [
    'uses' => 'JaimeCommentaireController@jaime',
]);

Route::get('unjaimeCommentaire/{id}', [
    'uses' => 'JaimeCommentaireController@unjaime',
]);

Route::get('/allJaimeCommenataire/{id}', [
    'uses' => 'JaimeCommentaireController@jaimeComment',
]);

Route::get('/publication/user/{id}', [
    'uses' => 'ProfileController@get_publication_user',
    'as' => 'user.publication',
]);

Route::post('/user/upload/picture/{id}', [
    'uses' => 'ProfileController@upload_picture',
    'as' => 'user.profile.picture',
]);

Route::post('/user/upload/coverture/{id}', [
    'uses' => 'ProfileController@upload_coverture',
    'as' => 'user.profile.coverture',
]);

// check if the user is friend or somthing else !
Route::get('/check/{id}', [

    'uses' => 'AmiesController@check',
    'as' => 'friend.check',
]);

Route::get('/add_friend/{id}', [

    'uses' => 'AmiesController@add_friend',
    'as' => 'add_friend',
]);

Route::get('/accept_friend/{id}', [

    'uses' => 'AmiesController@accept_friend',
    'as' => 'accept_friend',
]);

Route::get('/get_unreadnot', function () {

    return Auth::user()->unreadNotifications;

});

Route::get('/notifications', [

    'uses' => 'HomeController@notifications',
    'as' => 'notifications',
]);

Route::post('/notification/read', 'HomeController@read');
