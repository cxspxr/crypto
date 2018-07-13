<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Auth;
class CreateWithdrawalRequest extends FormRequest
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
            'amount' => [
                'required',
                function ($attribute, $value, $fail) {
                    if (!is_numeric($value)) {
                        return $fail('Необходимо ввести сумму в формате "1.23"');
                    }
                }
            ],
            'card' => ['required']
        ];
    }
}
