<?php


namespace App\Http\Requests\v1;


class ProductStoreRequest extends BaseRequest
{
    public function rules()
    {
        return [
            "title"=>"required",
            "description"=>"required",
            "status"=>"required|in:active,inactive"
        ];
    }
}
