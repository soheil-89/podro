<?php


namespace App\Http\Requests\v1;


use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Symfony\Component\HttpFoundation\Response;
use Urameshibr\Requests\FormRequest;

/**
 * Class BaseRequest
 * @package App\Http\Requestes
 */
class BaseRequest extends FormRequest
{
    /**
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * @param Validator $validator
     */
    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json($validator->errors(), Response::HTTP_UNPROCESSABLE_ENTITY));
    }

    public function messages()
    {
        return [

        ];
    }
}
