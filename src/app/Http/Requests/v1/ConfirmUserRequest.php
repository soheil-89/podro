<?php


namespace App\Http\Requests\v1;


class ConfirmUserRequest extends BaseRequest
{
    public function rules()
    {
        return [
            "user_id"=>"required|numeric|exists:users,id",
            "user_type"=>"required|in:admin,marketing",
            "parent"=>"numeric",
            "status"=>"required|in:active,inactive"
        ];
    }
}
