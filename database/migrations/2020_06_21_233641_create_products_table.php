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
          $table->bigIncrements('id');
          $table->string('ref')->unique();
          $table->string('name',100);
          $table->float('price');
          $table->string('paking_type')->nullable();
          $table->string('image');
          $table->string('description',200)->nullable();
          $table->unsignedBigInteger('customer_id');
          $table->foreign('customer_id')->references('id')->on('customers');
          $table->string('address',150);
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
