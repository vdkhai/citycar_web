<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreModel extends FormRequest
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
        $id = $this->route('id');
        $car_brand_id = $this->input('car_brand_id');
        return [
            'title' => "required|unique:car_models,title,{$id},id,car_brand_id,{$car_brand_id},deleted_at,NULL",
            'car_brand_id' => "required",
        ];
    }
}
