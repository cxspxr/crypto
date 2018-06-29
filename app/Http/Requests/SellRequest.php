<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use Auth;

class SellRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'transaction' => 'required',
            'ticker_id' => 'required|exists:tickers,id'
        ];
    }

    public function messages()
    {
        return [
            'transaction.required' => 'Поле транзакция обязательно к заполнению',
            'ticker_id.required' => 'Поле валюта обязательно к заполнению',
            'ticker_id.exists' => 'Такой валюты не существует'
        ];
    }
}
