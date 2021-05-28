<?php


namespace App\Http\Resources\v1;


use Illuminate\Http\Resources\Json\JsonResource;

class RegisterResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            "id" => $this->id,
            "email" => $this->email,
            "full_name" => $this->full_name,
            "created_at" => $this->created_at
        ];
    }
}
