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
        Schema::create('appeal_translations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('appeal_id')->constrained('appeals')->cascadeOnDelete();
            $table->foreignId('localization_id')->constrained('localizations')->cascadeOnDelete();
            $table->string('title');
            $table->text('description');
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
        Schema::dropIfExists('appeal_translations');
    }
};
