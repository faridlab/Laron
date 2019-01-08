<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;
use \App\Observers\Users as Observer;

class Users extends Resources
{

  protected $rules = array(
    'first_name' => 'required|string|max:50',
    'last_name' => 'required|string|max:50',
    'email' => 'required|string|email|max:255|unique:users',
    'password' => 'required|string|min:6|confirmed',
    'gender' => 'required',
    'dob' => 'required|date',
    'phone' => 'required',
    // 'country_id' => 'required|integer',
    // 'province_id' => 'required|integer',
    // 'city_id' => 'required|integer',
    // 'address' => 'required|string|max:100',
    // 'postal_code' => 'required|string|max:10'
  );

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'first_name', 'last_name', 'email', 'password',
  ];

  /**
   * The attributes that should be hidden for arrays.
   *
   * @var array
   */
  protected $hidden = [
      'password', 'remember_token',
  ];

  protected static function boot()
  {
    self::observe(Observer::class);
  }
}
