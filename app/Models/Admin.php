<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
  use  Notifiable;

  //

    protected $table='admins';

    protected $guard = 'admin';

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */

  protected $fillable = [
    'fname',
    'lname',
    'address',
    'latitude',
    'longitide',
    'city',
    'phone',
    'email',
    'password',
    'bank',
    'rib',
    'avatar',
    'statut',
    'updated_at',
    'created_at'];

  /**
   * The attributes that should be hidden for arrays.
   *
   * @var array
   */
  protected $hidden = [
    'password', 'remember_token',
    'email_verified_at',
    'created_at',
    'updated_at',
    'latitude',
    'longitide',
    'bank',
    'rib',
    'Link'
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

  public function scopeSelection($query){
    return $query->select('fname', 'lname','avatar','statut','city');
  }







}
