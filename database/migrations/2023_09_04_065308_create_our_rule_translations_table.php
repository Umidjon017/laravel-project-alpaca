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
        Schema::create('our_rule_translations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('our_rule_id')->constrained('our_rules')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('localization_id')->constrained('localizations')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('agreement_personal_data');
            $table->string('agreement_personal_data_policy');
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
        Schema::dropIfExists('our_rule_translations');
    }
};
