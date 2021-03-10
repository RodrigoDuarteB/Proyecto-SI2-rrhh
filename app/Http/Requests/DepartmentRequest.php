<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DepartmentRequest extends FormRequest{
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
         //   'name' => 'required|string|regex:/^[A-Z][A-Z,a-z, ]+&/',
         //   'description' => 'required|string|regex:/^[A-Z][A-Z,a-z, ]+&/',
         //   'employe_id' => 'required|numeric|regex:/^[0-9, ,--,+]+&/',
         //   'parent_id' => 'required|numeric|regex:/^[0-9, ,--,+]+&/',
        ];
    }
}
