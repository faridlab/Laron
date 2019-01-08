<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class CitiesCollection extends BaseCollection
{
    public function toArray($request)
    {
      $result = parent::toArray($request);
      if(!$result['error']) {
        foreach ($result['data'] as $value) {
          $value['country'] = $value->country;
          $value['province'] = $value->province;
        }
      }
      return $result;
    }
}
