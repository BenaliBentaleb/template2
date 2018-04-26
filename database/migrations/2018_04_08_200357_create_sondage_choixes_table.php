<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSondageChoixesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sondage_choixes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('sondage_id')->unsigned();
            $table->text('choix');
            $table->integer('nombre_reponse')->unsigned();
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
        Schema::dropIfExists('sondage_choixes');
    }
}
