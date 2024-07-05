<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEvaluationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evaluations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('intern_id');
            $table->foreignId('company_id');
            $table->string('period');
            $table->string('leaves_day');
            $table->string('contact_supervisor')->nullable();
            $table->string('punctual')->nullable();
            $table->string('reliably_performed_assignments')->nullable();
            $table->string('ability_solve_problem')->nullable();
            $table->string('organization_skills')->nullable();
            $table->string('communication_skills')->nullable();
            $table->string('ability_work_independently')->nullable();
            $table->string('willingness_learn_new_tasks')->nullable();
            $table->string('eagerness_to_learn')->nullable();
            $table->string('basic_skill')->nullable();
            $table->string('professional_appearance')->nullable();
            $table->string('overall_assessment_work_quality')->nullable();
            $table->text('professional_viewpoint')->nullable();
            $table->text('comments_student')->nullable();
            $table->text('comments_intership')->nullable();
            $table->text('comments')->nullable();
            $table->text('discuss_intern')->nullable();
            $table->string('signature')->nullable();
            $table->foreignId('company_supervisor_id')->constrained();
            $table->string('title');
            $table->text('address')->nullable();
            $table->string('contact');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('evaluations');
    }
}
