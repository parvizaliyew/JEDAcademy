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
        Schema::create('sillabuses', function (Blueprint $table) {
            $table->id();
            $table->text('month_1')->nullable();
            $table->text('month_2')->nullable();
            $table->text('month_3')->nullable();
            $table->text('month_4')->nullable();
            $table->text('month_5')->nullable();
            $table->text('month_6')->nullable();
            $table->text('month_7')->nullable();
            $table->text('month_8')->nullable();
            $table->text('month_9')->nullable();
            $table->smallInteger('course_id');
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
        Schema::dropIfExists('sillabuses');
    }
};
