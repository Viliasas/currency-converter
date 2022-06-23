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
        // TODO Finalize validation rules
        return [
            'amount' => 'required',
            'currency' => 'required|string|min:1',
            'crypto' => 'required|string|min:1',
        ];
    }
}
