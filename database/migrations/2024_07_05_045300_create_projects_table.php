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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description')->nullable();
            $table->foreignId('intern_id')->constrained();
            $table->string('leader');
            $table->string('member');
            $table->text('image')->nullable();
            $table->text('files')->nullable();
            $table->timestamp('start_date')->nullable();
            $table->timestamp('deadline_date')->nullable();
            $table->enum('priority',['high','middle','low']);
            $table->enum('status',['pending','in_progress','complete']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
