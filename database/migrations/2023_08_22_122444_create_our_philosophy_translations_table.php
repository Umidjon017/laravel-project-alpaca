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
        Schema::create('our_philosophy_translations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('our_philosophy_id')->constrained('our_philosophies')->cascadeOnDelete();
            $table->foreignId('localization_id')->constrained('localizations')->cascadeOnDelete();
            $table->string('title');
            $table->text('description');
            $table->text('additional');
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
        Schema::dropIfExists('our_philosophy_translations');
    }
};
