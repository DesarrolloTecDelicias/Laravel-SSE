<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompanyGraduatesWorkingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_graduates_workings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_survey_id');
            $table->String('career',50);
            $table->String('level', 30);
            $table->String('total');
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
        Schema::dropIfExists('company_graduates_workings');
    }
}
