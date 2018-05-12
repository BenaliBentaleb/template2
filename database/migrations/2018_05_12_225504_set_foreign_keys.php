<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SetForeignKeys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('roles', function(Blueprint  $table) {
            //$table->engine = "InnoDB";
           
            $table->foreign('user_id')
            ->references('id')->on('users')
            ->onDelete('cascade');
        });
     
      


    Schema::table('likes', function(Blueprint $table) {

        $table->foreign('user_id')
            ->references('id')->on('users')
            ->onDelete('cascade')->onUpdate('cascade');

            $table->foreign('publication_id')
            ->references('id')->on('publications')
            ->onDelete('cascade')->onUpdate('cascade');
    });

    Schema::table('commentaires', function(Blueprint $table) {

         $table->foreign('user_id')
            ->references('id')->on('users')
            ->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('publication_id')
            ->references('id')->on('publications')
            ->onDelete('cascade')->onUpdate('cascade');
    });

    Schema::table('sondages', function(Blueprint $table) {

        $table->foreign('publication_id')
            ->references('id')->on('publications')
            ->onDelete('cascade')->onUpdate('cascade');
   });

   Schema::table('faqs', function(Blueprint $table) {
   $table->foreign('publication_id')
   ->references('id')->on('publications')
   ->onDelete('cascade')->onUpdate('cascade');
   });

   Schema::table('publication_fichiers', function(Blueprint $table) {
    $table->foreign('publication_id')
    ->references('id')->on('publications')
    ->onDelete('cascade')->onUpdate('cascade');
    });


    Schema::table('publications', function(Blueprint $table) {
        $table->foreign('user_id')
        ->references('id')->on('users')
        ->onDelete('cascade')->onUpdate('cascade');

        $table->foreign('module_id')
        ->references('id')->on('modules')
        ->onDelete('cascade')->onUpdate('cascade');
        });


        Schema::table('reclamations', function(Blueprint $table) {
        $table->foreign('user_id')
        ->references('id')->on('users')
        ->onDelete('cascade')->onUpdate('cascade');

    });

    Schema::table('modules', function(Blueprint $table) {
        $table->foreign('formation_id')
        ->references('id')->on('formations')
        ->onDelete('cascade')->onUpdate('cascade');
        
        $table->foreign('semestre_id')
        ->references('id')->on('semestres')
        ->onDelete('cascade')->onUpdate('cascade');

    });

    Schema::table('formations', function(Blueprint $table) {
        $table->foreign('departement_id')
            ->references('id')->on('departements')
            ->onDelete('cascade')->onUpdate('cascade');

    });

    Schema::table('profiles', function(Blueprint $table) {
        $table->foreign('user_id')
        ->references('id')->on('users')
        ->onDelete('cascade')->onUpdate('cascade');

        $table->foreign('formation_id')
        ->references('id')->on('formations')
        ->onDelete('cascade')->onUpdate('cascade');

    });

    Schema::table('jaime_commentaires', function(Blueprint $table) {
        $table->foreign('commentaire_id')
        ->references('id')->on('commentaires')
        ->onDelete('cascade')->onUpdate('cascade');
        $table->foreign('user_id')
        ->references('id')->on('users')
        ->onDelete('cascade')->onUpdate('cascade');

    });

    Schema::table('amies', function(Blueprint $table) {
        $table->foreign('user_id')
            ->references('id')->on('users')
            ->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('friend_id')
            ->references('id')->on('users')
            ->onDelete('cascade')->onUpdate('cascade');
           

    });

    Schema::table('chats', function(Blueprint $table) {
        $table->foreign('user_id')
            ->references('id')->on('users')
            ->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('friend_id')
            ->references('id')->on('users')
            ->onDelete('cascade')->onUpdate('cascade');
           

    });

    Schema::table('portail_memoires', function(Blueprint $table) {
        $table->foreign('user_id')
            ->references('id')->on('users')
            ->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('formation_id')
            ->references('id')->on('formations')
            ->onDelete('cascade')->onUpdate('cascade');
           

    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
