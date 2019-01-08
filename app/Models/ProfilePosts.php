<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProfilePosts extends Model
{
    protected $rules = array(
      'profile_id' => 'required',
      'post_url' => 'required|string|max:100'
    );

    protected $fillable = ['profile_id', 'post_url', 'posts', 'likes', 'comments', 'shares', 'photo', 'caption', ''];

}
