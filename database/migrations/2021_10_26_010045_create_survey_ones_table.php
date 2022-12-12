<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSurveyOnesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('survey_ones', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('first_name', 100);
            $table->string('fathers_surname', 100);
            $table->string('mothers_surname', 100);
            $table->string('control_number', 10);
            $table->string('birthday', 15);
            $table->string('curp', 18);
            $table->string('sex', 10);
            $table->string('marital_status', 15);
            $table->string('address', 100);
            $table->string('zip_code', 20);
            $table->string('suburb', 100);
            $table->string('state', 100);
            $table->string('city', 100);
            $table->string('municipality', 100);
            $table->string('phone', 15)->nullable();
            $table->string('cellphone', 15);
            $table->string('email');
            $table->foreignId('career_id')->references('id')->on('careers')->onDelete('cascade');
            $table->foreignId('specialty_id')->references('id')->on('specialties')->onDelete('cascade');
            $table->string('qualified', 2);
            $table->string('qualified_year', 4);
            $table->string('income_month', 25);
            $table->string('income_year', 4);
            $table->string('month', 25);
            $table->string('year', 4);
            $table->string('percent_english', 3);
            $table->foreignId('language_id')->references('id')->on('languages')->onDelete('cascade');
            $table->string('percent_another_language', 3);
            $table->string('software')->nullable();
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
        Schema::dropIfExists('survey_ones');
    }
}
