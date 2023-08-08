<?php

namespace App\Http\Requests;



use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class UpdateDispatcherRequest extends FormRequest
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
            'dispatcher_id' => 'required',
            "first_name" => 'required',
            "last_name" => 'required',
            'phone_number' => 'required',
            'role' => 'required',
            "area_of_operation" => 'required',
            "email" => 'required'
        ];
    }

    public function messages()
    {
        return [
            'dispatcher_id' => 'The user id is required',
            'first_name' => 'The first name is required',
            'last_name' => 'The other names is required',
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
