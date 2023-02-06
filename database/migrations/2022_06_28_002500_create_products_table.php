<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string("user_id", 255)->nullable();
            $table->string("seller", 255)->nullable();
            $table->string("name", 255)->nullable();
            $table->string("ticket_no", 255)->nullable();
            $table->text("description")->nullable();
            $table->text("category")->nullable();
            $table->text("start_date")->nullable();
            $table->text("end_date")->nullable();
            $table->string("photo", 255)->nullable();
            $table->decimal("price", 6, 2);
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
        Schema::dropIfExists('products');
    }
}
