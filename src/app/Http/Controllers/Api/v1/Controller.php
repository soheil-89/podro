<?php


namespace App\Http\Controllers\Api\v1;

use Illuminate\Http\Response;
use Laravel\Lumen\Routing\Controller as BaseController;

class Controller extends BaseController
{
    protected function response($data, $statusCode = Response::HTTP_OK)
    {
        return response()->json($data, $statusCode);
    }
}
