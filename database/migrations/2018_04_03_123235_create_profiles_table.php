<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            //$table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->string('photo_profile');
            $table->integer('formation_id')->unsigned();
            $table->enum('sexe',['femele','homme']);
            $table->string('telephone');
            $table->date('date_naissance');
            $table->text('information');
            $table->string('facebook');
            $table->string('twitter');
            
            $table->timestamps();

          /*  $table->foreign('user_id')
        ->references('id')->on('users')
        ->onDelete('cascade')->onUpdate('cascade');

        $table->foreign('formation_id')
        ->references('id')->on('formations')
        ->onDelete('cascade')->onUpdate('cascade');*/
          
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profiles');
    }
}
