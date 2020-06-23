<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
  protected $table='cities';

  protected $fillable =['price_delivery','price_refund','price_cancel','Date_delivery','statut','created_at','updated_at'];

  protected $hidden=['created_at','updated_at'];

  //

  public function werahouses()
  {
    return $this -> hasMany(Warehouse::class);
  }


}
