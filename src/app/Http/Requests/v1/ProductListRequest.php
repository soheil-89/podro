<?php


namespace App\Http\Requests\v1;


class ProductListRequest extends BaseRequest
{
    public function rules()
    {
        return [
            "status"=>"in:active,inactive"
        ];
    }
}
