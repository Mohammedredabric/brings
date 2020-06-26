<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Warehouse extends Model
{
    protected $table='warehouses';

    protected $fillable =['name','city_id','address','phone','price_warehousing','price_packing_basic','price_packing_ultra','price_packing_primum','created_at','updated_at'];

    protected $hidden=['created_at','updated_at'];

    //

    public function scopeSelection($query){

      return $query -> select('id','name','city_id','address','phone','price_warehousing','price_packing_basic','price_packing_ultra','price_packing_primum');
    }


    public function scopeSelectwithcity($query){
      return $query ->  select('id','name','city_id','address','phone')  -> with(['city' => function($q){
        return $q->select('id','city');
      }]);

    }

    //

    public function city()
    {
        return $this -> belongsTo(City::class);
    }

    public function products()
    {
        return $this -> belongsToMany(Product::class,'warehouse_product');
    }
}
