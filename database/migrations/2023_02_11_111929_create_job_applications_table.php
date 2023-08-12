<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_applications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('photo_path')->nullable();
            $table->integer('type')->default(1);
            $table->foreignId('career_id')->references('id')->on('careers')->onDelete('cascade');
            $table->string('name')->nullable();
            $table->longText('description')->nullable();
            $table->string('period')->nullable();
            $table->integer("vacancies");
            $table->longText('benefits')->nullable();
            $table->string('consultant_name')->nullable();
            $table->string('consultant_phone')->nullable();
            $table->string('consultant_email')->nullable();
            $table->string('consultant_position')->nullable();
            $table->string('in_charge_name')->nullable();
            $table->string('in_charge_position')->nullable();
            $table->string('area')->nullable();
            $table->string('contact_name');
            $table->string('contact_phone');
            $table->string('contact_email');
            $table->integer('status')->default(1);
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
        Schema::dropIfExists('job_applications');
    }
}
