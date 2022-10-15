<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompanySurveyOnesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_survey_ones', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->string('business_name');
            $table->string('address');
            $table->string('zip');
            $table->string('suburb');
            $table->string('state');
            $table->string('city');
            $table->string('municipality');
            $table->string('phone', 10);
            $table->string('email');
            $table->string('business_structure');
            $table->string('company_size');
            $table->string('business_activity_selector');
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
        Schema::dropIfExists('company_survey_ones');
    }
}
