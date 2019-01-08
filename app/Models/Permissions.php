<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use \App\Observers\Permissions as Observer;

class Permissions extends Resources
{
    protected $rules = array(
        'name' => 'required|string|max:191',
        'guard_name' => ''
    );

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'guard_name'
    ];

    protected static function boot()
    {
        self::observe(Observer::class);
    }
}
