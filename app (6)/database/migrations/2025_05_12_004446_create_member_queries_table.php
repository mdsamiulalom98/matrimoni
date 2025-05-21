<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('member_queries', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('member_id')->index();
            $table->string('gender');
            $table->string('regular_salah')->nullable();
            $table->string('have_beard')->nullable();
            $table->string('is_religious')->nullable();
            $table->string('hajj_intent')->nullable();
            $table->string('sunnah_clothing')->nullable();
            $table->string('read_quran')->nullable();
            $table->string('financial_status')->nullable();
            $table->string('halal_income')->nullable();
            $table->string('addiction_free')->nullable();
            $table->string('personality_trait')->nullable();
            $table->string('previous_marriage_problem')->nullable();
            $table->string('parental_permission')->nullable();
            $table->string('inlaws_residence')->nullable();
            $table->string('post_marriage_job')->nullable();
            $table->string('is_hijaban')->nullable();
            $table->string('lineage')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('member_queries');
    }
};
