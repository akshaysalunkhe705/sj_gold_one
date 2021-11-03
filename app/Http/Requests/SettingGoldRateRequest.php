<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SettingGoldRateRequest extends FormRequest
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
            'gold_melting_name' => 'required|string',
            'gold_melting_buy_rate' => 'required|integer',
            'gold_melting_sale_rate' => 'required|integer'
        ];
    }
}
