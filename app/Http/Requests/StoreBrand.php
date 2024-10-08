<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBrand extends FormRequest
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
        return [
            'name' => "required|unique:car_brands,name,{$id},id,deleted_at,NULL",
            'logo' => "image|mimes:png,jpg",
        ];
    }
}
