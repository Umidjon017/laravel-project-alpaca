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
        Schema::create('project_translations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('project_id')->constrained()->cascadeOnDelete();
            $table->foreignId('localization_id')->constrained()->cascadeOnDelete();
            $table->string('name');
            $table->string('booklet')->nullable();
            $table->text('body')->nullable();
            $table->string('addres')->nullable();
            $table->text('yard_text')->nullable();
            $table->text('hall_text')->nullable();
            $table->text('term')->nullable();
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
        Schema::dropIfExists('project_translations');
    }
};
