<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreGstIn extends FormRequest
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
            'gstin'    => 'numeric|unique:vendors|size:15',
            'pan'      => 'numeric|size:10',
            'pin_code' => 'size:10',
            'phone'    => 'numeric',
            'website'  => 'url',
            'country'  => 'alpha',
        ];
    }

    public function messages()  {
        return[
            'gstin.size'        => 'The gst number must have 15 characters',
            'gstin.numeric'     => 'The gst must be 15 digit number',
            'pan.size'          => 'The pan number must have 10 characters',
            'pan.numeric'       => 'Pan number  must be a 10 digit number',
            'phone.numeric'     => 'Phone number must be a number',
            'url'       => 'enter correct url.',
            
            ];
    }
}
