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
        Schema::create('agents', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('phone')->unique();
            $table->string('password');
            $table->string('address')->nullable();
            $table->string('agent_type')->nullable();
            $table->string('nid_passport')->nullable();
            $table->string('nid_image')->nullable();
            $table->string('verifyToken')->nullable();
            $table->string('passResetToken')->nullable();
            $table->string('image')->default('public/uploads/avatar/avatar.png');
            $table->string('status')->default('active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('agents');
    }
};
