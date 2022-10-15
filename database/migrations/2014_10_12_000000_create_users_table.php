<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('fathers_surname', 100)->nullable();
            $table->string('mothers_surname', 100)->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('role', 10);
            $table->string('control_number', 15)->nullable();
            $table->string('career', 100)->nullable();
            $table->string('income_month', 25)->nullable();
            $table->string('income_year', 4)->nullable();
            $table->string('year_graduated', 4)->nullable();
            $table->string('month_graduated', 25)->nullable();
            $table->rememberToken();
            $table->foreignId('current_team_id')->nullable();
            $table->string('profile_photo_path', 2048)->nullable();
            $table->string('cv')->nullable();
            $table->tinyInteger('is_new_user')->nullable();
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
        Schema::dropIfExists('users');
    }
}
