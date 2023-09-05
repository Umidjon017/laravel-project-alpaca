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
        Schema::create('price_block_translations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('price_block_id')->constrained('price_blocks')->cascadeOnDelete();
            $table->foreignId('localization_id')->constrained('localizations')->cascadeOnDelete();
            $table->string('title');
            $table->string('excepted_options');
            $table->string('ignored_options');
            $table->string('for_month');
            $table->string('link_title');
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
        Schema::dropIfExists('price_block_translations');
    }
};
