<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TeacherRequest extends FormRequest
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
        if($this->isMethod('POST'))
        {
            return [
                'teacher_name' => 'Required',
                'teacher_email' => 'Required|email',
                'teacher_contact_no' => 'Required|integer',
                'teacher_address' => 'Required',
                'street' => '',
                'city' => '',
                'pincode' => 'integer',
                'state' => '',
                'country' => '',
                // 'password' => 'Required',
                // 'teacher_subjects' => 'Required'
            ];
        }else{
            return [
                
            ];
        }
    }
}
