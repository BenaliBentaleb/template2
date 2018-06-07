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

Route::get('/signaler/publication/{id}', [
    'uses' => 'PublicationController@signaler',
    'as' => 'publication.signaler',
]);


Route::get('/unsignaler/publication/{id}', [
    'uses' => 'PublicationController@unsignaler',
    'as' => 'publication.unsignaler',
]);

Route::post('/suivie/publication/{id}', [
    'uses' => 'SuiviController@suivie',
    'as' => 'publication.suivie',
]);

Route::post('/unsuivie/publication/{id}', [
    'uses' => 'SuiviController@unsuivie',
    'as' => 'publication.unsuivie',
]);

Route::get('/single/publication/{slug}', [
    'uses' => 'PublicationController@single_publication',
    'as' => 'publication.single',
]);


Route::get('/filtrer/publication/module/{id}', [
    'uses' => 'PublicationController@filtrer_publication_par_module',
    'as' => 'publication.filtrer.module',
]);


Route::get('/check/user/suivie/publication/{user}/{id}', [
    'uses' => 'SuiviController@check_user_if_follow_publication',
    'as' => 'publication.check.user.follow.pub',
]);


Route::post('/blog/store', [
    'uses' => 'PublicationController@store',
    'as' => 'blog.store'
]);
Route::post('/faq/store', [
    'uses' => 'FaqController@store',
    'as' => 'faq.store'
]);
Route::post('/sondage/store', [
    'uses' => 'SondageChoixController@store',
    'as' => 'sondagechoix.store'
]);

Route::get('/getPublicationOfSondage/{id}', [
    'uses' => 'SondageController@get_publication_of_sondage'
    
]);


Route::get('/sondage', [
    'uses' => 'SondageController@show',
    'as' => 'sondage.show'
]);

Route::post('/sondage/choix/{id}', [
    'uses' => 'SondageChoixUserController@store',
    'as' => 'sondage.choix.store'
]);

Route::get('/sondage/choix/getpercentage/{id}', [
    'uses' => 'SondageChoixUserController@get_votes_percentage_users',
    'as' => 'sondage.choix.percentage'
]);

Route::get('/formation/{nom}', [
    'uses' => 'HomeController@modules',
    'as' => 'formation',
]);



Route::get('/publication/{id}', [
    'uses' => 'HomeController@destroy',
    'as' => 'publication.destroy'
]);

Route::get('/modifier/publication/{id}', [
    'uses' => 'PublicationController@edit',
    'as' => 'publication.modifier'
]);

Route::post('/update/publication/{id}', [
    'uses' => 'PublicationController@update',
    'as' => 'publication.update'
]);

Route::post('/jaime/{id}', [
    'uses' => 'LikeController@jaime'
]);

Route::get('/unjaime/{id}', [
    'uses' => 'LikeController@unjaime'
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

Route::get('/commentaire/delete/{id}',[
    'uses'=>'commentaireController@delete'
]);
Route::get("/allcomment/{id}", [
    'uses' => 'commentaireController@allcomment',
]);

Route::get("/download/{id}", [
    'uses' => 'HomeController@download',
    'as' => 'file.download',
]);

Route::get("/remove/file/{id}", [
    'uses' => 'HomeController@remove',
    'as' => 'file.remove',
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

Route::get('/profile/{id}', [
    'uses' => 'ProfileController@profile',
    'as' => 'user.profile',
]);

Route::post('/user/upload/picture/{id}', [
    'uses' => 'ProfileController@upload_picture',
    'as' => 'user.profile.picture',
]);

Route::post('/user/upload/coverture/{id}', [
    'uses' => 'ProfileController@upload_coverture',
    'as' => 'user.profile.coverture',
]);

Route::post('/user/profile/modifier/{id}', [
    'uses' => 'ProfileController@update',
    'as' => 'user.profile.update',
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

Route::get('/delete_invitation/{id}' , [
    'uses' => 'AmiesController@delete_invitation'
]);

Route::get('/delete_friend/{id}' , [
    'uses' => 'AmiesController@delete_friend'
]);

Route::get('/get_unreadnot', function () {

    return Auth::user()->unreadNotifications->whereNotIn('type',['App\Notifications\ReclamationNotification','App\\Notifications\\SignalerNotification']);

});

Route::get('/get_unreadAdminNot', function () {

    return Auth::user()->unreadNotifications->whereIn('type',['App\Notifications\ReclamationNotification','App\\Notifications\\SignalerNotification']);

});

/*

Route::get('/notifications', [

    'uses' => 'HomeController@notifications',
    'as' => 'notifications',
]);*/

Route::post('/notification/read/{id}', 'HomeController@read');
Route::post('/admin/notification/read/{id}', 'HomeController@admin_read');

Route::get('/chat',[
        'uses'=>'ChatController@getchat'

]);

Route::get('/getformation/{type}', [
    'uses'=>'PortailMemoireController@getformation',
    'as'=>'getformation.memoire'
]);

Route::get('/portail/memoire',[
    'uses'=>'PortailMemoireController@index',
    'as'=>'portail.memoire'

]);

Route::get('/ajouter/memoire',[
    'uses'=>'PortailMemoireController@show',
    'as'=>'ajouter.memoire'

]);

Route::post('/memoire/saveFile',[
    'uses'=>'PortailMemoireController@saveFile',
    'as'=>'store.memoire'

]);

Route::get('/memoire/download/{id}',[
    'uses'=>'PortailMemoireController@download',
    'as'=>'download.memoire'

]);

Route::get('/chat', 'ChatController@index')->middleware('auth')->name('chat.index');
Route::get('/chat/{id}', 'ChatController@show')->middleware('auth')->name('chat.show');
Route::post('/chat/getChat/{id}', 'ChatController@getChat')->middleware('auth');
Route::post('/chat/sendChat', 'ChatController@sendChat')->middleware('auth');




Route::get('/admin/index', [
    'uses'=>'AdminController@index',
    'as'=>'admin.index'
])->middleware('admin');

Route::get('/admin/utilisateur', [
    'uses'=>'AdminController@utilisateur',
    'as'=>'admin.utilisateur'
])->middleware('admin');

Route::get('/admin/delete/user/{id}', [
    'uses'=>'AdminController@delete',
    'as'=>'admin.utilisateur.delete'
])->middleware('admin');

Route::get('/admin/publications', [
    'uses'=>'AdminController@publications',
    'as'=>'admin.utilisateur.publications'
])->middleware('admin');

Route::get('/admin/ajouter/utitlisateur/form', [
    'uses'=>'AdminController@ajouter_utilisateur_form',
    'as'=>'admin.form.ajouter.utilisateur'
])->middleware('admin');

Route::get('/admin/modifier/utitlisateur/form/{id}', [
    'uses'=>'AdminController@modifier_utilisateur_form',
    'as'=>'admin.form.modifier.utilisateur'
])->middleware('admin');

Route::post('/admin/ajouter/utitlisateur', [
    'uses'=>'AdminController@ajouter_utilisateur',
    'as'=>'admin.ajouter.utilisateur'
])->middleware('admin');

Route::post('/admin/modifier/utitlisateur/{id}', [
    'uses'=>'AdminController@modifier_utilisateur',
    'as'=>'admin.modifier.utilisateur'
])->middleware('admin');