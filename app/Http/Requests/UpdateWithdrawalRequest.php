<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Auth;

class UpdateWithdrawalRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::guard('admin')->check();
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
                    if (!is_numeric($value) || (double)$value <= 0 ) {
                        return $fail('Необходимо ввести сумму в формате "1.23"');
                    }
                }
            ],
            'status_id' => 'required|exists:statuses,id'
        ];
    }
}
