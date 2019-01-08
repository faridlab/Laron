<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class KolInterests extends Resources
{
  protected $rules = array(
    'kol_id' => 'required',
    'interest_id' => 'required'
  );
}
