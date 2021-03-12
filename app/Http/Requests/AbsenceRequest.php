<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AbsenceRequest extends FormRequest
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
            'title' => 'required|string|regex:/^([A-Z][A-Z,a-z, ]+)/',
            'reason' => 'required|string|regex:/^([A-Z][A-Z,a-z, ]+)/',
            'type' => 'required|numeric',
            'begin' => 'required|date',
            'end' => 'required|date|after:begin',
        ];
    }
}
