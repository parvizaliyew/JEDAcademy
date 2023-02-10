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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('adress');
            $table->string('email');
            $table->string('phone_1');
            $table->string('phone_2');
            $table->string('phone_3');
            $table->string('ins');
            $table->string('fb');
            $table->string('tw');
            $table->string('ln');
            $table->string('wp');
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
        Schema::dropIfExists('settings');
    }
};
