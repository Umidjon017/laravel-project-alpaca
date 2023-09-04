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
        Schema::create('info_block_translations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('info_block_id')->constrained('info_blocks')->cascadeOnDelete();
            $table->foreignId('localization_id')->constrained('localizations')->cascadeOnDelete();
            $table->string('title')->nullable();
            $table->text('description')->nullable();
            $table->longText('body')->nullable();
            $table->string('link_title')->nullable();
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
        Schema::dropIfExists('info_block_translations');
    }
};
