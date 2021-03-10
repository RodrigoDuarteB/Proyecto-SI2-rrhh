<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest{
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
            'title' => 'required|string|max:100',
            'description' => 'required|string|max:250',
                       
        ];
    }

    public function messages(){
        return [
            'title.required' => 'Se ha superado la cantidad de caracteres permitidos en el Título, max:100',
            'description.required' => 'Se ha superado la cantidad de caracteres permitidos en la Descripción, max:250',
            ];
    }
}
