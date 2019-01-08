<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Database\QueryException;

class BaseCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $response = [
            'app' => config('app.name'),
            'api' => config('app.api'),
            'version' => config('app.version'),
            'timestamp' => time(),
            'status' => 'Success',
            'code' => 200,
            'message' => 'OK',
            'error' => false,
            'data' => []
        ];

        try {
            $response['data'] = $this->collection;
            return $response;
        } catch(QueryException $err) {
            $response['error'] = true;
            $response['status'] = 'Error';
            $response['code'] = $err->getCode();
            $response['message'] = $err->getMessage();
            return $response;
        }
    }
}
