<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class Interests extends Resources
{
    public static function kolInterests($id) {
        $sql = "SELECT
                  inter.*,
                  IFNULL((SELECT COUNT(*) FROM kol_interests AS ki WHERE ki.interest_id = inter.id AND ki.kol_id = ? AND ki.deleted_at IS NULL) , 0) AS selected
                FROM
                  interests AS inter
                ORDER BY
                  inter.name ASC";

      $users = DB::select($sql, [$id]);
      return $users;
    }

}
