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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('foto_profile')->default('default-profile.png');
            $table->string('nama');
            $table->string('nisn')->unique();
            $table->string('password');
            $table->rememberToken();
            $table->enum('role', ['admin', 'penjual', 'user'])->default('user');
            $table->dateTime('login_terakhir')->nullable();
            $table->boolean('is_banned');
            $table->boolean('is_active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
