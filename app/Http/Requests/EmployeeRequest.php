<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeRequest extends FormRequest{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(){
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(){
        return [
            'name' => 'required|string|regex:/^[A-Z][A-Z,a-z, ]+&/',
            'last_name' => 'required|string|regex:/^[A-Z][A-Z,a-z, ]+&/',
            'work_phone' => 'required|string|regex:/^[0-9, ,--,+]+&/',
            'personal_phone' => 'string|regex:/^[0-9, ,--,+]+&/',
            'image_name' => 'required|image',
            'sex' => 'required|string',
            'ID_number' => 'required|numeric|regex:/^[0-9, ,--,+]+&/',
            'address' => 'required|string',
            'nationality' => 'required|string|regex:/^[a-z][a-z, ]+&/',
            'passport' => 'required|numeric|regex:/^[0-9, ,--,+]+&/',
            'birthdate' => 'required|date',
            'birthplace' => 'required|string|regex:/^[A-Z,a-z, ]+&/',
            'marital_status' => 'required|string|regex:/^[A-Z,a-z, ]+&/',
            'children' => 'required|numeric|regex:/^[0-9]+&/',
            'emergency_contact' => 'required|string|regex:/^[0-9, ,--,+]+&/'
        ];
    }
}
