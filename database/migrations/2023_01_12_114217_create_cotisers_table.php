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
        Schema::create('cotisers', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('users_id')->references('id')->on('users');
            $table->foreignId('echeances_id')->references('id')->on('echeances');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cotisers');
    }
};
