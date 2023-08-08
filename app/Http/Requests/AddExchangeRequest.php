<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class AddExchangeRequest extends FormRequest
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
            "size_of_cylinder" => 'required',
            "quantity" => 'required',
            'cost_of_delivery' => 'required',
            'cost_of_service' => 'required',

            'date_of_delivery' => 'required|date',
            'delivery_time_frame' => 'required',
            'delivery_location' => 'required',
            'customer_id' => 'required',
            'digital_location' => 'required'
        ];
    }



    public function messages()
    {
        return [
            "size_of_cylinder.required" => 'The size of cylinder is required',
            "quantity.required" => 'The quantity is required',
            "cost_of_service.required" => 'The cost of service is required',
            "cost_of_delivery.required" => 'The cost of delivery is required',
            'date_of_delivery.required' => 'The date of delivery is required',
            "customer_id.required" => 'The customer id is required',
            'delivery_time_frame.required' => 'The delivery time frame is required',
            'delivery_location.required' => 'The delivery location is required',
            'digital_location.required' => 'The digital location is required',
        ];
    }


    protected function failedValidation(Validator $validator)
    {


        throw new HttpResponseException(response()->json(

            ['success' => false, 'data' =>  $validator->errors()->all()],

        ));
    }
}
