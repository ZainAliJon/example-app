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
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string('product_name')->nullable();
            $table->string('price')->nullable();
            $table->string('description')->nullable();
            $table->string('number')->nullable();
            $table->string('seller')->nullable();
            $table->string('buyer')->nullable();
            $table->string('status')->default('pending');
            $table->string('file')->nullable();
            $table->foreignId('customer_id')->constrained('users')->onDelete('cascade')->onUpdate('cascade')->nullable();
            $table->foreignId('classifier_id')->constrained('users')->onDelete('cascade')->onUpdate('cascade')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
