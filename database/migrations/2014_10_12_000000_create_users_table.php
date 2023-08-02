<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
<<<<<<< HEAD
            $table->increments('id');
            $table->string('name');
            $table->string('email');
            //문제 발생 - $table->string('email')->unique();
            $table->string('password');
=======
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('name_en');
            $table->string('phone1', 3)->nullable();
            $table->string('phone2', 4)->nullable();
            $table->string('phone3', 4)->nullable();
            $table->string('phone', 15)->nullable();
            $table->string('email')->unique();
            $table->string('password');
            $table->longText('description')->nullable();
>>>>>>> 05be93f9353a951ccee3be3f08b76db6f57d3107
            $table->rememberToken();
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
