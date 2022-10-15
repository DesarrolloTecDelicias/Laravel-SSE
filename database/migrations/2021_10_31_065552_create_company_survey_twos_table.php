<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompanySurveyTwosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_survey_twos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->string('number_graduates');
            $table->string('congruence');
            $table->boolean('competence1');
            $table->boolean('competence2');
            $table->boolean('competence3');
            $table->boolean('competence4');
            $table->boolean('competence5');
            $table->boolean('competence6');
            $table->boolean('competence7');
            $table->boolean('competence8');
            $table->string('most_demanded_career');
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
        Schema::dropIfExists('company_survey_twos');
    }
}
