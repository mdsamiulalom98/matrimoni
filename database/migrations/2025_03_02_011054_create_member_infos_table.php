<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('member_infos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('member_id');
            $table->integer('residency_id');
            $table->integer('country_id');
            $table->integer('religion_id');
            $table->string('dob');
            $table->string('age');
            $table->string('guardian_phone');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('member_infos');
    }
};
