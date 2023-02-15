<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string("user_id", 255)->nullable();
            $table->string("first_name", 255);
            $table->string("last_name", 255);
            $table->string("order_no", 255);
            $table->string("thing_you_want_to_order", 255);
            $table->string("DOB", 255);
            $table->string("street_address", 255);
            $table->string("city", 255);
            $table->string("region", 255);
            $table->string("pin_code", 255);
            $table->string("country", 255);
            $table->string("payment_id", 255)->nullable();
            $table->string("amount", 255)->nullable();
            $table->string("product_id", 255)->nullable();
            $table->string("contact", 255)->nullable();
            $table->string("status", 255)->nullable();
            $table->string("winning_order_status", 255)->nullable();
            $table->string("photo", 255)->nullable();
            $table->string("subject", 255)->nullable();
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
        Schema::dropIfExists('orders');
    }
}
