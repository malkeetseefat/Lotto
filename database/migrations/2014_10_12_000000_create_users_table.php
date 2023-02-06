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
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('default_password');
            $table->string('suponser_id')->nullable();
            $table->string('parent_id')->nullable();
            $table->string('wallet_points')->nullable();
            $table->string('actual_point')->nullable();
            $table->string('contact')->nullable();
            $table->string('rank')->nullable();
            $table->string('role')->nullable();
            $table->string('OTP')->nullable();
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
