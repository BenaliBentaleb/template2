<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            // balak ra7 nzid attribut te3 formation
            //bech tkoun l kol formation les evenements ta3ha wela event 
            // man3raf chof ida tbanlek mliha zidha
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('formation_id')->unsigned()->nullable();
            $table->string('event_role');
            $table->string('titre');
            $table->string('description');
            $table->longText('contenu');
            $table->date('debut');
            $table->date('fin');
            $table->date('fin');
            $table->boolean('is_archived')->default('0');
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
        Schema::dropIfExists('events');
    }
}
