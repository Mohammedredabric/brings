<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
  protected $table='cities';

  protected $fillable =['city', 'price_delivery','price_refund','price_cancel','Date_delivery','statut','created_at','updated_at'];

  protected $hidden=['created_at','updated_at'];

  //

  public function werahouses()
  {
    return $this -> hasMany(Warehouse::class);
  }


  public function scopeSelection($query){
     return $query -> select('city', 'price_delivery','price_refund','price_cancel','Date_delivery','statut');
  }

  public function scopeActive($query){
    return $query -> where('statut','active')->select('id','city');

  }


}
