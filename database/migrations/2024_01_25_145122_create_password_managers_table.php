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
        Schema::create('password_managers', function (Blueprint $table) {
            $table->id();
            $table->string('site_name')->nullable();
            $table->string('user_id')->nullable();
            $table->string('name');
            $table->string('email')->nullable();
            $table->string('user_name')->nullable();
            $table->string('password')->nullable();
            $table->string('pin')->nullable();
            $table->string('notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('password_managers');
    }
};
