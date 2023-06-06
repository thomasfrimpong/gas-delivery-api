<?php

namespace App\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;

class CreateUserRequest extends FormRequest
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
            "other_names" => 'required',
            'phone_number' => 'required',
            'role' => 'required',
            "area_of_operation" => 'nullable',
            "email" => 'required|email'
        ];
    }

    public function messages()
    {
        return [
            "email.required" => 'The email is required',
            "email.email" => 'The email is not valid',
            "area_of_operation" => 'The area of operation is required',
            'role' => 'The role is required',


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
