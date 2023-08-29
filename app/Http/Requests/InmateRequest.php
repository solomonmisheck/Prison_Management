<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InmateRequest extends FormRequest
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
        $rules = [
            'code' => 'required|unique:inmates,code',
            'firstname' => 'required', 
            'middlename'=> 'nullable', 
            'lastname'=> 'required', 
            'gender'=> 'required', 
            'dob'=> 'required', 
            'address'=> 'nullable', 
            'education_level'=> 'nullable', 
            'cell_block_id'=> 'required', 
            'sentence'=> 'required', 
            'date_from'=> 'required', 
            'date_to'=> 'required', 
            'contact_name'=> 'nullable', 
            'contact_phone'=> 'nullable', 
            'contact_relation'=> 'nullable', 
            'image' => ['nullable','mimes:jpeg,jpg,png'], 
            'created_by' => 'nullable',
            'crimes' => 'nullable',
            'offence' => 'nullable',
            'judgement' => 'nullable',
            'court' => 'nullable',
            'virdict' => 'nullable',
            'date_of_judgemet' => 'nullable',
            'id_number' => 'required'
        ];

        return $rules;
    }
}
