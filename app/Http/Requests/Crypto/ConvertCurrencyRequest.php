<?php

namespace App\Http\Requests\Crypto;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Crypto currency conversion request class. Responsible for request validation.
 */
class ConvertCurrencyRequest extends FormRequest
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
            'amount' => 'required|numeric|min:0.01',
            'currency' => 'required|string|in:EUR,USD,PLN',
            'crypto' => 'required|string|min:1',
        ];
    }
}
