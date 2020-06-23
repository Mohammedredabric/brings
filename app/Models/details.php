<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class details extends Model
{
  protected $table='details';

  protected $fillable =['customer_id','type','detaille','created_at','updated_at'];

  protected $hidden=['created_at','updated_at'];

  //

  public function customer(){
    return $this -> belongsTo(Customer::class);
  }












}
