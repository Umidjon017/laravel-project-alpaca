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
        Schema::create('checkbox_block_translations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('checkbox_block_id')->constrained('checkbox_blocks')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('localization_id')->constrained('localizations')->cascadeOnDelete();
            $table->string('title');
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
        Schema::dropIfExists('checkbox_block_translations');
    }
};
