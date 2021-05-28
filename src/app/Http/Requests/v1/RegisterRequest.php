<?php


namespace App\Http\Requests\v1;


class RegisterRequest extends BaseRequest
{
    public function rules()
    {
        return [
            "email" => "required|email",
            "full_name" => "required",
            "password" => "required|min:6",
        ];
    }
}
