<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWarehousesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('warehouses', function (Blueprint $table) {
          $table->bigIncrements('id');
          $table->string('name',100);
          $table->unsignedBigInteger('city_id');
          $table->foreign('city_id')->references('id')->on('cities');
          $table->string('address',150);
          $table->string('phone',11);
          $table->smallInteger('price_warehousing')->default(0);
          $table->smallInteger('price_packing_basic')->default(0);
          $table->smallInteger('price_packing_ultra')->default(0);
          $table->smallInteger('price_packing_primum')->default(0);
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
        Schema::dropIfExists('warehouses');
    }
}
