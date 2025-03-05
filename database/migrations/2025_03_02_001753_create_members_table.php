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
        Schema::create('members', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('member_id')->unique();
            $table->string('phone')->unique();
            $table->text('address')->nullable();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('verifyToken')->nullable();
            $table->string('passResetToken')->nullable();
            $table->string('image')->default('public/uploads/avatar/avatar.png');
            $table->integer('gender');
            $table->integer('premium');
            $table->string('premium_date');
            $table->tinyInteger('status')->default(0);
            $table->tinyInteger('publish');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('members');
    }
};
