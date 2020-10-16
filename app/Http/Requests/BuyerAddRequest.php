<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BuyerAddRequest extends FormRequest
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
            'buyer_name' => 'required|max:100',
            'company_name' => 'required|max:255',
            'phone' => 'required|max:50',
            'email' => 'required|max:50',
            'address' => 'required',
            'country_id' => 'required',
            'city_id' => 'required',
            'buyer_type' => 'required'
        ];
    }
}
