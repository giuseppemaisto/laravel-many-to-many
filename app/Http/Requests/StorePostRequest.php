<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title'=>['required', 'unique:posts', 'max:150'],
            'language'=>['required'],
            'description'=>['nullable'],
            'type_id'=>['nullable','exists:types,id'],
            'technologies'=>['exists:technologies,id'],
        ];
    }

    public function messages(){
        return[
            'title.required'=>'titolo obbligatorio',
            'title.unique' => 'titolo già presente',
            'title.max' => 'il titolo deve essere di massimo :max caratteri',
            'type_id.exists' => 'non valido',
            'technologies' => 'la tecnologia non è valida',
        ];
    }
}
