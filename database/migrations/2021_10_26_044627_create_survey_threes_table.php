<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSurveyThreesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('survey_threes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('do_for_living', 25);
            $table->string('speciality', 15)->nullable();
            $table->string('school', 100)->nullable();
            $table->string('long_take_job', 20)->nullable();
            $table->string('hear_about', 35)->nullable();
            $table->boolean('competence1')->nullable();
            $table->boolean('competence2')->nullable();
            $table->boolean('competence3')->nullable();
            $table->boolean('competence4')->nullable();
            $table->boolean('competence5')->nullable();
            $table->boolean('competence6')->nullable();
            $table->foreignId('language_id')->nullable();
            $table->string('speak_percent', 3)->nullable();
            $table->string('write_percent', 3)->nullable();
            $table->string('read_percent', 3)->nullable();
            $table->string('listen_percent', 3)->nullable();
            $table->string('seniority', 20)->nullable();
            $table->string('year', 4)->nullable();
            $table->string('salary', 25)->nullable();
            $table->string('management_level', 18)->nullable();
            $table->string('job_condition', 12)->nullable();
            $table->string('job_relationship', 3)->nullable();
            $table->string('business_name', 100)->nullable();
            $table->string('business_activity', 100)->nullable();
            $table->string('address', 100)->nullable();
            $table->string('zip', 30)->nullable();
            $table->string('suburb', 100)->nullable();
            $table->string('state', 100)->nullable();
            $table->string('city', 100)->nullable();
            $table->string('municipality')->nullable();
            $table->string('phone', 10)->nullable();
            $table->string('fax')->nullable();
            $table->string('web_page')->nullable();
            $table->string('boss_email')->nullable();
            $table->string('business_structure', 10)->nullable();
            $table->string('company_size', 30)->nullable();
            $table->foreignId('business_id')->nullable();
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
        Schema::dropIfExists('survey_threes');
    }
}
