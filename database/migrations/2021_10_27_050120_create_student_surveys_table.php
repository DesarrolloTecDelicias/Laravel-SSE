<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentSurveysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_surveys', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->boolean('survey_one_done')->default(false);
            $table->boolean('survey_two_done')->default(false);
            $table->boolean('survey_three_done')->default(false);
            $table->boolean('survey_four_done')->default(false);
            $table->boolean('survey_five_done')->default(false);
            $table->boolean('survey_six_done')->default(false);
            $table->boolean('survey_seven_done')->default(false);
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
        Schema::dropIfExists('student_surveys');
    }
}
