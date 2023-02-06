<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBankdetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bankdetails', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->string('bankname');
            $table->string('account_no');
            $table->string('firstname');
            $table->string('lastname');
            $table->string('branchcode');
            $table->string('accounttype');
            $table->string('streetaddress');
            $table->string('city');
            $table->string('zipcode');
            $table->string('country');
            $table->string('panno');
            $table->string('aadharno');
            $table->string('contact');
            $table->string('emailaddress');
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
        Schema::dropIfExists('bankdetails');
    }
}
