<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class Kols extends Resources
{
  protected $rules = array(
    'first_name' => 'required|string|max:50',
    'last_name' => 'required|string|max:50',
    // 'email' => 'required|email|unique:kols',
    // 'phone' => 'required|string|max:20',
    // 'address' => 'required|string|max:100'
  );

  public static function list() {
      $sql = "SELECT
                kols.*,
                GROUP_CONCAT(DISTINCT interests.name SEPARATOR ', ') AS interest
              FROM
                kols
                LEFT JOIN kol_interests AS ki ON (kols.id = ki.kol_id AND ki.deleted_at IS NULL)
                LEFT JOIN interests ON (ki.interest_id = interests.id AND interests.deleted_at IS NULL )
              WHERE
                kols.deleted_at IS NULL
              GROUP BY
                kols.id";

    $users = DB::select($sql);
    return $users;
  }

}
