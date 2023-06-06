<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class UpdateCylinderRequest extends FormRequest
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
            'cylinder_id' => 'required',
            "size_of_cylinder" => 'required',
            "cost_per_unit" => 'required',
            "number_of_units" => 'required'
        ];
    }

    public function messages()
    {
        return [
            'cylinder_id' => 'The cylinder id is required',
            'size_of_cylinder' => 'The size of cylinder is required',
            'cost_per_unit' => 'The cost per unit is required',
            'number_of_units' => 'The number of units is required',


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
