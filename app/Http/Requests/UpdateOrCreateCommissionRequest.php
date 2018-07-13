<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Auth;
use App\Commission;

class UpdateOrCreateCommissionRequest extends FormRequest
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
        $id = $this->current_commission ? $this->current_commission->id : null;

        return [
            'commission' => [
                'required',
                function ($attribute, $value, $fail) {
                    if (!is_numeric($value)) {
                        return $fail('Необходимо ввести коммиссию в формате "1.23"');
                    }
                }
            ],
            'from' => [
                'required',
                'unique:commissions,from,' . $id,
                function ($attribute, $value, $fail) {
                    if (!is_numeric($value)) {
                        return $fail('Необходимо ввести число в формате "1.23"');
                    }
                }
            ]
        ];
    }
}
