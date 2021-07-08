<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
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
            'restaurant_id'  => 'required|integer|max:20',
            'table_id'       => 'required|integer|max:100',
            'client_id'      => 'required|integer|max:400',
            'booking_time'   => 'required|integer|max:1',
        ];
    }
}
