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
        Schema::create('rejection_notes', function (Blueprint $table) {
            $table->id();
            $table->string('note')->nullable();
            $table->string('file')->nullable();
            $table->string('status')->nullable();
            $table->foreignId('task_id')->constrained('tasks')->onDelete('cascade')->onUpdate('cascade')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rejection_notes');
    }
};
