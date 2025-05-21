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
        Schema::create('member_families', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('member_id')->index();
            $table->string('father_name')->nullable();
            $table->string('father_profession')->nullable();
            $table->integer('father_alive')->nullable();
            $table->string('mother_name')->nullable();
            $table->string('mother_profession')->nullable();
            $table->integer('mother_alive')->nullable();
            $table->integer('brother_count')->nullable();
            $table->integer('sister_count')->nullable();
            $table->string('financial_status')->nullable();
            $table->string('religious_status')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('member_families');
    }
};
