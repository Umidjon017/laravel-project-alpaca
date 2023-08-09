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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->foreignId('region_id')->constrained()->cascadeOnDelete();
            $table->integer('bitrix_id');
            $table->integer('apartments');
            $table->integer('floors');
            $table->string('card_image');
            $table->string('background_image')->nullable();
            $table->string('logo')->nullable();
            $table->string('status')->default('1');
            $table->mediumText('3d_tour_one')->nullable();
            $table->mediumText('3d_tour_two')->nullable();
            $table->string('yard_image')->nullable();
            $table->string('hall_image')->nullable();
            $table->mediumText('location')->nullable();
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->string('order')->nullable();
            $table->string('logo_map')->nullable();
            $table->string('slug')->unique();
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
        Schema::dropIfExists('projects');
    }
};
