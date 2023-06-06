<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class CancelOrderRequest extends FormRequest
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
            'order_id' => 'required',
            'reason_for_cancellation' => 'required'
        ];
    }

    public function messages()
    {
        return [
            "order_id.required" => 'The order id is required',
            "reason_for_cancellation.required" => 'The reason for cancellation is required',

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
