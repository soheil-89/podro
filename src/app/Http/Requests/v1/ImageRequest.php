<?php


namespace App\Http\Requests\v1;


class ImageRequest extends BaseRequest
{
    public function rules()
    {
        return [
            "image" => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            "type" =>"required|in:user,product",
            "id" =>"required|numeric"
        ];
    }
}
