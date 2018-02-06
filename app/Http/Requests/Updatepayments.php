<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Updatepayments extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->sales_payments()->can('payment-update');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'id' => 'required',
            'payment_date' => '',
            
        ];
    }
}
