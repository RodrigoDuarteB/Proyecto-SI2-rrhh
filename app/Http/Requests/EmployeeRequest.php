<?php

namespace App\Http\Requests;

use Carbon\Carbon;
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
            'name' => 'required|string|regex:/^([A-Z][A-Z,a-z, ]+)/',
            'last_name' => 'required|string|regex:/^([A-Z][A-Z,a-z, ]+)/',
            'work_phone' => 'required|string|regex:/^([0-9, ,--,+]+)/',
            'personal_phone' => 'string|regex:/^([0-9, ,--,+]+)/',
            'image_name' => 'required|image',
            'sex' => 'required|string',
            'ID_number' => 'required|numeric|regex:/^([0-9, ,--,+]+)/',
            'address' => 'required|string',
            'nationality' => 'required|string|regex:/^([a-z][a-z, ]+)/',
            'passport' => '',
            'birthdate' => 'required|date',
            'birthplace' => 'required|string|regex:/^([A-Z,a-z, ]+)/',
            'marital_status' => 'required|numeric',
            'children' => 'numeric',
            'emergency_contact' => 'string|regex:/^([0-9, ,--,+]+)/',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'confirm_password' => 'required|same:password',
            'contract_name' => 'required|string|regex:/^([A-Z][A-Z,a-z,0-9, ]+)/',
            'contract_description' => 'required|string|regex:/^([A-Z][A-Z,a-z,0-9, ]+)/',
            'contract_final_date' => 'required|date|after:'. Carbon::now('America/La_Paz')->toDateString(),
            'contract_job' => 'required|numeric',
            'contract_planning' => 'required|numeric',
        ];
    }
}
