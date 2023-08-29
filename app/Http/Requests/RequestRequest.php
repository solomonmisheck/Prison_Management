<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestRequest extends FormRequest
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
            'inmate_id' => 'nullable',
            'requester_id' => 'nullable',
            'requester_phone' => 'required',
            'relation' => 'required',
            'inmate_id_number' => 'required|exists:inmates,id_number'
        ];

        return $rules;
    }
}
