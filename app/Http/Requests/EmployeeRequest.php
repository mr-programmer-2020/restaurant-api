<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeRequest extends FormRequest
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
            'role'             => 'required|integer|max:3',
            'first_name'       => 'required|string|max:15',
            'second_name'      => 'required|string|max:15',
            'work_place'       => 'required|string|max:20',
            'restaurant_id'    => 'required|integer|max:20',
        ];
    }
}
