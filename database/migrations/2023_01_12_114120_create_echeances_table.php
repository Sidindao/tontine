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
        Schema::create('echeances', function (Blueprint $table) {
            $table->id();
            $table->dateTime('dateEcheance');
            $table->integer('numero');
            $table->foreignId('tontines_id')->references('id')->on('tontines');
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
        Schema::dropIfExists('echeances');
    }
};
