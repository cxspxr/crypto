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
        $id = Ticker::where('ticker', $this->ticker)->first();

        return [
            'ticker' => 'required|unique:tickers,id,'.$id,
            'name' => 'required',
            'wallet' => 'required'
        ];
    }
}
