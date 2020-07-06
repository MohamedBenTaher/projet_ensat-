<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVolsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::create('vols', function (Blueprint $table) {
            $table->id();
            $table->string('ville_dep');
            $table->string('ville_arr');
            $table->date('date_dep');
            $table->date('date_arr');
            $table->time('heure_dep');
            $table->time('heure_arr');
            $table->float('prix');
            $table->string('classe',25);
            $table->integer('num_places');
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
        Schema::dropIfExists('vols');
    }
}
