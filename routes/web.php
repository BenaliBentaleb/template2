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
    'uses'=>'AdminController@deleteUser',
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
/* START SECTION DEPARTEMENT */
Route::get('/admin/departement', [
    'uses'=>'AdminController@departement',
    'as'=>'admin.departement'
])->middleware('admin');

Route::get('/admin/departement/ajout', [
    'uses'=>'AdminController@ajoutDepartement',
    'as'=>'admin.departement.ajout'
])->middleware('admin');

Route::post('/admin/departement/store', [
    'uses'=>'AdminController@storeDepartement',
    'as'=>'admin.departement.store'
])->middleware('admin');

Route::post('/admin/departement/edit/{id}', [
    'uses'=>'AdminController@editDepartement',
    'as'=>'admin.departement.edit'
])->middleware('admin');

Route::get('/admin/modifie/departement/{id}', [
    'uses'=>'AdminController@modifieDepartement',
    'as'=>'admin.departement.modifie'
])->middleware('admin');

Route::get('/admin/departement/delete/{id}', [
    'uses'=>'AdminController@deleteDepartement',
    'as'=>'admin.departement.delete'
])->middleware('admin');
/* END SECTION DEPARTEMENT */

/* START SECTION FORMATION */
Route::get('/admin/formation', [
    'uses'=>'AdminController@formation',
    'as'=>'admin.formation'
])->middleware('admin');

Route::get('/admin/formation/ajout', [
    'uses'=>'AdminController@ajoutFormation',
    'as'=>'admin.formation.ajout'
])->middleware('admin');

Route::post('/admin/formation/store', [
    'uses'=>'AdminController@storeFormation',
    'as'=>'admin.formation.store'
])->middleware('admin');

Route::post('/admin/formation/edit/{id}', [
    'uses'=>'AdminController@editFormation',
    'as'=>'admin.formation.edit'
])->middleware('admin');

Route::get('/admin/modifie/formation/{id}', [
    'uses'=>'AdminController@modifieFormation',
    'as'=>'admin.formation.modifie'
])->middleware('admin');

Route::get('/admin/formation/delete/{id}', [
    'uses'=>'AdminController@deleteFormation',
    'as'=>'admin.formation.delete'
])->middleware('admin');
/* END SECTION FORMATION */

/* START SECTION MODULES */
Route::get('/admin/module', [
    'uses'=>'AdminController@module',
    'as'=>'admin.module'
])->middleware('admin');

Route::get('/admin/module/ajout', [
    'uses'=>'AdminController@ajoutModule',
    'as'=>'admin.module.ajout'
])->middleware('admin');

Route::post('/admin/module/store', [
    'uses'=>'AdminController@storeModule',
    'as'=>'admin.module.store'
])->middleware('admin');

Route::post('/admin/module/edit/{id}', [
    'uses'=>'AdminController@editModule',
    'as'=>'admin.module.edit'
])->middleware('admin');

Route::get('/admin/modifie/module/{id}', [
    'uses'=>'AdminController@modifieModule',
    'as'=>'admin.module.modifie'
])->middleware('admin');

Route::get('/admin/module/delete/{id}', [
    'uses'=>'AdminController@deleteModule',
    'as'=>'admin.module.delete'
])->middleware('admin');
/* END SECTION MODULES */

/* START SECTION MEMOIRE */
Route::get('/admin/memoire', [
    'uses'=>'AdminController@memoire',
    'as'=>'admin.memoire'
])->middleware('admin');

Route::get('/admin/memoire/ajout', [
    'uses'=>'AdminController@ajoutMemoire',
    'as'=>'admin.memoire.ajout'
])->middleware('admin');

Route::post('/admin/memoire/store', [
    'uses'=>'AdminController@storeMemoire',
    'as'=>'admin.memoire.store'
])->middleware('admin');

Route::post('/admin/memoire/edit/{id}', [
    'uses'=>'AdminController@editMemoire',
    'as'=>'admin.memoire.edit'
])->middleware('admin');

Route::get('/admin/modifie/memoire/{id}', [
    'uses'=>'AdminController@modifieMemoire',
    'as'=>'admin.memoire.modifie'
])->middleware('admin');

Route::get('/admin/memoire/delete/{id}', [
    'uses'=>'AdminController@deleteMemoire',
    'as'=>'admin.memoire.delete'
])->middleware('admin');
/* END SECTION MEMOIRE */

/* START SECTION RECLAMATION */
Route::get('/admin/reclamation', [
    'uses'=>'AdminController@reclamation',
    'as'=>'admin.reclamation'
])->middleware('admin');

Route::get('/admin/reclamation/delete/{id}', [
    'uses'=>'AdminController@deleteReclamation',
    'as'=>'admin.reclamation.delete'
])->middleware('admin');

/* Route::get('/admin/reclamation/delete/{id}', [
    'uses'=>'AdminController@deleteReclamation',
    'as'=>'admin.reclamation.delete'
])->middleware('admin'); */

Route::get('/admin/reclamation/repondre/{id}', [
    'uses'=>'AdminController@repondreReclamation',
    'as'=>'admin.reclamation.repondre'
])->middleware('admin');

Route::get('/admin/reclamation/terminer/{id}', [
    'uses'=>'AdminController@terminerReclamation',
    'as'=>'admin.reclamation.terminer'
])->middleware('admin');

Route::get('/admin/reclamation/rejeter/{id}', [
    'uses'=>'AdminController@rejeterReclamation',
    'as'=>'admin.reclamation.rejeter'
])->middleware('admin');

Route::post('/admin/reclamation/sendmsg/{id}', [
    'uses'=>'AdminController@sendMessageReclamation',
    'as'=>'admin.reclamation.oo'
])->middleware('admin');
/* END SECTION RECLAMATION */

/* START SECTION EVENT */
Route::get('/admin/event', [
    'uses'=>'AdminController@event',
    'as'=>'admin.event'
])->middleware('admin');

Route::get('/admin/event/ajout', [
    'uses'=>'AdminController@ajoutEvent',
    'as'=>'admin.event.ajout'
])->middleware('admin');

Route::post('/admin/event/store', [
    'uses'=>'AdminController@storeEvent',
    'as'=>'admin.event.store'
])->middleware('admin');

Route::post('/admin/event/edit/{id}', [
    'uses'=>'AdminController@editEvent',
    'as'=>'admin.event.edit'
])->middleware('admin');

Route::get('/admin/modifie/event/{id}', [
    'uses'=>'AdminController@modifieEvent',
    'as'=>'admin.event.modifie'
])->middleware('admin');

Route::get('/admin/archiver/event/{id}', [
    'uses'=>'AdminController@archiverEvent',
    'as'=>'admin.event.archiver'
])->middleware('admin');
Route::get('/admin/unarchive/event/{id}', [
    'uses'=>'AdminController@unarchiveEvent',
    'as'=>'admin.event.unarchive'
])->middleware('admin');

Route::get('/admin/event/delete/{id}', [
    'uses'=>'AdminController@deleteEvent',
    'as'=>'admin.event.delete'
])->middleware('admin');
/* END SECTION EVENT */
