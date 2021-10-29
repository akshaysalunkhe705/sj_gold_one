<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AttendanceRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    public function rules()
    {
        return [
            'student_id' => 'required',
            'subject_id' => 'required',
            'batch' => 'required',
            'attendace_date' => 'required',
            'attendance_status' => 'required'
        ];
    }
}
