<?php


namespace App\Http\Requests\v1;


class UserListRequest extends BaseRequest
{
    public function rules()
    {
        return [
            "email" => "email",
            "full_name" => "required",
            "user_id"=>"numeric",
            "user_type"=>"in:admin,marketing",
            "parent"=>"numeric",
            "status"=>"in:active,inactive"
        ];
    }
}
