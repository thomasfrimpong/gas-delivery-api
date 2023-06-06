<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class OrderPaymentRequest extends FormRequest
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
            "date_of_payment" => 'required',
            "order_id" => 'required',
            "customer_id" => 'required',
            "amount_paid" => 'required',
            "payment_number" => 'required'
        ];
    }

    public function messages()
    {
        return [
            "date_of_payment.required" => 'The date of payment is required',
            "order_id.required" => 'The order id is  required',
            "customer_id.required" => 'The customer id is  required',
            "amount_paid.required" => 'The amount paid is  required',
            "payment_number.required" => 'The payment number is  required',

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
