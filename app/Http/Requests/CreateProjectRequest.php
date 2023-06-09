<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateProjectRequest extends FormRequest
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
            'address' => 'required',
            'sample_start_date' => 'required',
            'customer_id' => 'required',
//            'referral_id' => 'required',
        ];
    }

    public function messages()
    {
        return [
          'customer_id.required' => 'Owner field is required',
            'referral_id.required' => 'Referral field is required'
        ];
    }
}
