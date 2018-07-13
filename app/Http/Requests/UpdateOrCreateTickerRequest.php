<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Auth;
use App\Ticker;

class UpdateOrCreateTickerRequest extends FormRequest
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
        $id = Ticker::where('ticker', 't' . $this->ticker . 'USD')->first();
        $id = $id ? $id->id : null;

        $updatingId = $this->current_ticker ? $this->current_ticker->id : null;

        return [
            'ticker' => [
                'required',
                function ($attribute, $value, $fail) use ($id, $updatingId) {
                    if (Ticker::find($id) && $id !== $updatingId) {
                        return $fail('Такая валюта уже существует!');
                    }
                }
            ],
            'name' => 'required',
            'wallet' => 'required'
        ];

    }
}
