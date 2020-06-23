<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
  protected $table='products';

  protected $fillable =['ref','name','price','paking_type','image','description','id_customer','created_at','updated_at'];

  protected $hidden=['created_at','updated_at'];

  //

  public function custumer()
  {
    return $this -> belongsTo(Customer::class);
  }

  public function Weahehouse()
  {
    return $this -> belongsToMany(Warehouse::class,'warehouse_product');
  }
}
