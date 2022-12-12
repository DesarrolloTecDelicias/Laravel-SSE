<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSurveyFoursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('survey_fours', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('efficiency_work_activities', 15);
            $table->string('academic_training', 15);
            $table->string('usefulness_professional_residence', 15);
            $table->tinyInteger('study_area');
            $table->tinyInteger('title');
            $table->tinyInteger('experience');
            $table->tinyInteger('job_competence');
            $table->tinyInteger('positioning');
            $table->tinyInteger('languages');
            $table->tinyInteger('recommendations');
            $table->tinyInteger('personality');
            $table->tinyInteger('leadership');
            $table->tinyInteger('others');            
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
        Schema::dropIfExists('survey_fours');
    }
}
