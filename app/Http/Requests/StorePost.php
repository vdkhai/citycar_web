<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

class StorePost extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'identify' => 'required',
            'title' => 'required',
            'price' => 'required|numeric',
            'car_brand_id' => 'required',
            'car_model_id' => 'required',
            'transmission' => 'required',
            'body_type' => 'required',
            'fuel_type' => 'required',
            'current_color' => 'required',
            'seat' => 'required',
            'state' => 'required',
            'registration_date' => 'nullable|date_format:d/m/Y',
            'registration_type' => 'nullable',
            'current_mileage' => 'nullable|numeric',
            // 'principal_warranty' => 'nullable',
            'principal_warranty_exp_date' => 'required_if:principal_warranty,true|date_format:d/m/Y',
        ];
    }
}
