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
        Schema::create('partner_expectations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('age');
            $table->string('complexion');
            $table->string('height');
            $table->string('education_qualification');
            $table->string('district');
            $table->string('marital_status');
            $table->string('profession');
            $table->string('economic_situation');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('partner_expectations');
    }
};
