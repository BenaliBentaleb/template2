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
            $table->string('photo_profile')->nullable();
            $table->string('coverture')->nullable();
            $table->integer('formation_id')->unsigned()->nullable();
            $table->enum('sexe',['femele','homme'])->nullable();
            $table->string('telephone')->nullable();
            $table->date('date_naissance')->nullable();
            $table->string('addresse')->nullable();
            $table->string('email')->nullable();
            $table->text('information')->nullable();
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('instagram')->nullable();
            $table->string('youtube')->nullable();
           
            
            $table->timestamps();

          
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
