<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWinningsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('winnings', function (Blueprint $table) {
            $table->id();
            $table->string("user_id", 255)->nullable();
            $table->string('first_name')->nullable();
            $table->string('lastname')->nullable();
            $table->string('email')->nullable();
            $table->string('street_address')->nullable();
            $table->string('city')->nullable();
            $table->string('pin_code')->nullable();
            $table->string('country')->nullable();
            $table->string('contact')->nullable();
            $table->string('product_id')->nullable();
            $table->string('product_name')->nullable();
            $table->string('product_points')->nullable();
            $table->string('bankname')->nullable();
            $table->string('account_no')->nullable();
            $table->string('bankdetail_id')->nullable();
            $table->string('submission_type')->nullable();
            $table->string('cash_amount')->nullable();
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
        Schema::dropIfExists('winnings');
    }
}
