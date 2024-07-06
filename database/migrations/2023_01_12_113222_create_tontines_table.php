<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tontines', function (Blueprint $table) {
            $table->id();
            $table->string('label');
            $table->dateTime('dateDeDebut');
            $table->integer('nbEcheance');
           $table->enum('perodicite',['hebdomadaire','mensuel','quotidien','annuel']);
           $table->enum('etat',['accepter','refuser','encours','fin','demande','supprimer']);
           $table->foreignId('users_id')->references('id')->on('users');
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
        Schema::dropIfExists('tontines');
    }
};
