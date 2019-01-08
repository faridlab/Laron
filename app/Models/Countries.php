<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Countries extends Resources
{

  protected $rules = array(
    'name' => 'required|string|max:100',
    'isocode' => 'required|string|max:2|unique:countries',
    'phonecode' => 'required'
  );

}
