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
            $table->bigIncrements('id');
            $table->string('email')->unique();
            $table->string('name');
            $table->string('nim');
            $table->string('telp');
            $table->string('status');
            $table->string('instagram');
            $table->string('gender');
            $table->string('job');
            $table->string('company');
            $table->string('kajian');
            $table->string('title');
            $table->string('angkatan')->nullable();
            $table->string('photo')->default("default.png");
            $table->string('password');
            $table->boolean('isVerified')->default(0);
            $table->boolean('isAdmin')->default(0);
            $table->timestamp('email_verified_at')->nullable();
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
