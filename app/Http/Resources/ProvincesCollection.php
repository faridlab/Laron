<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ProvincesCollection extends BaseCollection
{

  public function toArray($request)
  {
    $result = parent::toArray($request);
    if(!$result['error']) {
      foreach ($result['data'] as $value) {
        $value['country'] = $value->country;
        // TODO: find how to get the relations hasMany
        // if($request->route('id')) {
        //   $value['cities'] = $value->cities;
        // }
      }
    }
    return $result;
  }
}
