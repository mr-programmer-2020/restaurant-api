<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Http\Requests\UserRequest;
class TableRequest extends FormRequest
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
            
            'serial_number'   => 'required|integer|max:20',
            'restaurant_id'   => 'required|ineger|max:20',
            'quantity'        => 'required|ineger|min:6|max:50'
        ];
    }
}
