<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class Profiles extends Resources
{
  protected $rules = array(
    'kol_id' => 'required',
    'username' => 'required|string|max:100',
    'fullname' => 'required|string|max:255',
    'channel' => 'required'
  );

  protected $fillable = ['kol_id', 'username', 'fullname', 'channel', 'website', 'bio', 'posts', 'followers', 'following', 'photo'];

  public static function kolProfiles($id) {
    $sql = "SELECT
              prof.*,
              post.id AS post_id,
              post.caption AS post_caption,
              post.photo AS post_photo,
              post.post_url,
              (SELECT AVG(profile_posts.likes + profile_posts.comments) FROM profile_posts WHERE profile_posts.profile_id = prof.id ORDER BY profile_posts.id DESC LIMIT 10) AS rate,
              post.likes AS post_likes,
              post.comments AS post_comments,
              post.shares AS post_shares,
              post.updated_at AS post_updated_at
            FROM
              profiles AS prof
              INNER JOIN profile_posts AS post ON (prof.id = post.profile_id)
            WHERE
              prof.kol_id = ?
              AND prof.deleted_at IS NULL
            GROUP BY
              post.id
            ORDER BY
              post.id DESC
            LIMIT 10";

    $data = DB::select($sql, [$id]);
    if(count($data) > 0) {
      $swap = array();
      foreach ($data as $item) {
        if(!isset($swap[$item->id])) {
          $swap[$item->id] = array(
          "id" => $item->id,
          "kol_id" => $item->kol_id,
          "username" => $item->username,
          "fullname" => $item->fullname,
          "website" => $item->website,
          "bio" => $item->bio,
          "posts_count" => $item->posts,
          "followers_count" => $item->followers,
          "following_count" => $item->following,
          "channel" => $item->channel,
          "photo" => $item->photo,
          "rate" => $item->rate,
          "created_at" => $item->created_at,
          "updated_at" => $item->updated_at,
          "deleted_at" => $item->deleted_at,
          "posts" => array()
          );
        }

        $swap[$item->id]['posts'][] = array(
          "id" => $item->post_id,
          "caption" => $item->post_caption,
          "photo" => $item->post_photo,
          "url" => $item->post_url,
          "likes" => $item->post_likes,
          "comments" => $item->post_comments,
          "shares" => $item->post_shares,
          "updated_at" => $item->post_updated_at
        );
      }
      return array_values($swap);
    }
    return $data;
  }
}
