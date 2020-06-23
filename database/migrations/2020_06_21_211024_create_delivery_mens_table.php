<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeliveryMensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('delivery_mens', function (Blueprint $table) {
          $table->bigIncrements('id');
          $table->string('fname',100);
          $table->string('lname',100);
          $table->string('address',150);
          $table->string('city',100);
          $table->string('phone',11);
          $table->string('email')->unique();
          $table->string('bank',30)->nullable();
          $table->string('rib',30)->nullable();
          $table->string('avatar')->nullable();
          $table->integer('latitude')->nullable();
          $table->integer('longitide')->nullable();;
          $table->string('statut',25)->default('Active');
          $table->smallInteger('price_delivery')->default(0);
          $table->smallInteger('price_refund')->default(0);
          $table->smallInteger('price_cancel')->default(0);
          $table->timestamp('email_verified_at')->nullable();
          $table->string('password');
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
        Schema::dropIfExists('delivery_mens');
    }
}
