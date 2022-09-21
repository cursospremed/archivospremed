<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wp_users', function (Blueprint $table) {
            $table->id('ID');
            $table->string('user_login',60);
            $table->string('user_pass',255);
            $table->string('user_nicename',50);
            $table->string('user_email',100);
            $table->string('user_url',100);
            $table->dateTime('user_registered');
            $table->string('user_activation_key',255);
            $table->integer('user_status',11);
            $table->string('display_name',250);
            $table->integer('matricula',50);
            $table->string('mobile_number',50);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('wp_users');
    }
};
