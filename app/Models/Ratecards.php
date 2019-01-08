<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ratecards extends Resources
{
    protected $fillable = ['kol_id', 'price', 'channel',];
    protected $rules = array(
        'kol_id' => 'required',
        'price' => 'required|integer',
        'channel' => 'required|string|max:255'
    );

}
