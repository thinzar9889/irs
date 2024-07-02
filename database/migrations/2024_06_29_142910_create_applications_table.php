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
        Schema::create('applications', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('title');
            $table->string('position');
            $table->string('department');
            $table->string('gender');
            $table->integer('male');
            $table->integer('female');
            $table->date('from_date');
            $table->date('to_date');
            $table->unsignedBigInteger('company_id');
            $table->string('education');
            $table->string('salary');
            $table->string('type')->nullable();
            $table->string('image')->nullable();
            $table->longText('description');
            $table->longText('requirement');
            $table->string('email');
            $table->string('phone');
            $table->longText('benefit')->nullable();
            $table->longText('highlight')->nullable();
            $table->longText('opportunity')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applications');
    }
};
