<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HealthRecordRequest extends FormRequest
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
            'inmate_id' => 'required',
            'disease_id' => 'required',
            'treatment_done' => 'nullable',
            'status' => 'nullable',
            'date_from' => 'required',
            'date_to' =>'nullable'
        ];
        return $rules;
    }
}
