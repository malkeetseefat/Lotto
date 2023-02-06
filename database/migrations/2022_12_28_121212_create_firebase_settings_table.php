<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFirebaseSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('firebase_settings', function (Blueprint $table) {
            $table->id();
            $table->string("user_id", 255)->nullable();
            $table->string('apiKey')->nullable();
            $table->string('authDomain')->nullable();
            $table->string('projectId')->nullable();
            $table->string('storageBucket')->nullable();
            $table->string('messagingSenderId')->nullable();
            $table->string('appId')->nullable();
            $table->string('measurementId')->nullable();
            $table->string('twillo_sid')->nullable();
            $table->string('twillo_token')->nullable();
            $table->string('twillo_messagingServiceSid')->nullable();
            $table->string('status')->nullable();
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
        Schema::dropIfExists('firebase_settings');
    }
}
