<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Customer extends Authenticatable
{
  use  Notifiable;
  //
  protected $guard = 'customer';

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */

  protected $fillable = [  'fname', 'lname', 'address', 'city','phone', 'email','password','discount','bank','rib','avatar','statut','type', 'updated_at', 'created_at'];


  /**
   * The attributes that should be hidden for arrays.
   *
   * @var array
   */

  protected $hidden = [
    'password', 'remember_token','bank','rib','id'
  ];

  /**
   * The attributes that should be cast to native types.
   *
   * @var array
   */

  protected $casts = [
    'email_verified_at' => 'datetime',
  ];

  //
  public function products(){

      return $this -> hasMany(Product::class);
  }

  public function details(){

    return $this -> hasMany(details::class);
  }

}
