<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
  protected $table = 'products';

  protected $fillable = ['ref','name','price','paking_type','image','description','customer_id','created_at','updated_at'];

  protected $hidden = ['created_at','updated_at'];

  //

  public function scopeSelection($query){
    return $query -> select('id','ref','name','price','customer_id') -> with(['custumer'=>function($q){
      return $q -> select('id','fname','lname');
    }]);
  }

  //

  public function custumer()
  {
    return $this -> belongsTo(Customer::class,'customer_id');
  }

  public function Weahehouse()
  {
    return $this -> belongsToMany(Warehouse::class,'warehouse_product');
  }
}
