<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePortailMemoiresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('portail_memoires', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('formation_id')->unsigned();
            $table->string('titre');
            $table->string('type');
           // $table->string('specialite');
            $table->string('date');
            $table->string('encadreur');
            $table->string('etudiant1');
            $table->string('etudiant2');
            $table->string('etudiant3');
            $table->string('etudiant4');
            $table->string('fichier');
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
        Schema::dropIfExists('portail_memoires');
    }
}