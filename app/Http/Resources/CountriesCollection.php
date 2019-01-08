<?php

namespace App\Http\Resources;

use Illuminate\Database\QueryException;

class CountriesCollection extends BaseCollection
{
  public function toArray($request)
  {
    $result = parent::toArray($request);
    if(!$result['error']) {
      foreach ($result['data'] as $value) {
        $value['provinces'] = $value->provinces;
      }
    }
    return $result;
  }
}
