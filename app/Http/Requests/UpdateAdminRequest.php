<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class UpdateAdminRequest extends FormRequest
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
            "last_names" => 'required',
            'phone_number' => 'required',
            'admin_id' => 'required',
            "email" => 'required|email'
        ];
    }
    public function messages()
    {
        return [
            'admin_id' => 'The admin id is required',
            'first_name' => 'The first name is required',
            'last_names' => 'The other names is required',
            'phone_number' => 'The phone number is required',
            "email.required" => 'The email is required',
            "email.email" => 'The email is not valid',

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
