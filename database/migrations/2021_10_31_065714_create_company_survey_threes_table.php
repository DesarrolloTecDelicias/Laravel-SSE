<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompanySurveyThreesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_survey_threes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->tinyInteger('resolve_conflicts');
            $table->tinyInteger('orthography');
            $table->tinyInteger('process_improvement');
            $table->tinyInteger('teamwork');
            $table->tinyInteger('time_management');
            $table->tinyInteger('security');
            $table->tinyInteger('ease_speech');
            $table->tinyInteger('project_management');
            $table->tinyInteger('puntuality');
            $table->tinyInteger('rules');
            $table->tinyInteger('integration_work');
            $table->tinyInteger('creativity');
            $table->tinyInteger('bargaining');
            $table->tinyInteger('abstraction');
            $table->tinyInteger('leadership');
            $table->tinyInteger('changes');
            $table->string('job_performance');
            $table->longText('requirement');
            $table->longText('comments')->nullable();
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
        Schema::dropIfExists('company_survey_threes');
    }
}
