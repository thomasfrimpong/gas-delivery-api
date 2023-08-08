<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;

class CreateAdminRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            //
            "first_name" => 'required',
            "last_name" => 'required',
            'phone_number' => 'required',

            "email" => 'required|email'
        ];
    }

    public function messages()
    {
        return [
            "email.required" => 'The email is required',
            "email.email" => 'The email is not valid',
            'first_name' => 'The first name is required',
            'last_name' => 'The other names is required',
            'phone_number' => 'The phone number is required',


        ];
    }


    protected function failedValidation(Validator $validator)
    {


        throw new HttpResponseException(response()->json(

            ['success' => false, 'data' =>  $validator->errors()->all()],
            422
        ));
    }
}
