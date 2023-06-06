<?php

namespace App\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class UpdateCustomerRequest extends FormRequest
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
            'customer_id' => 'required',
            'first_name' => 'required',
            "other_names" => 'required',
            'phone_number' => 'required'

        ];
    }

    public function messages()
    {
        return [
            "customer_id.required" => 'The customer id name is required',
            "first_name.required" => 'The first name is required',
            "other_names.required" => 'The other names is required',
            "phone_number.required" => 'The phone number is not required',

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
