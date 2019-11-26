<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeCreateRequest extends FormRequest
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
            'name' => 'required|unique:employees,name,NULL,id,deleted_at,NULL',
            'code' => 'required|unique:employees,code,NULL,id,deleted_at,NULL',
            'phone_no' => 'required|unique:employees,code,NULL,id,deleted_at,NULL',
            'email' => 'required|unique:employees,code,NULL,id,deleted_at,NULL',
            'salutation'=>'required',
            'dob'=>'required',
            'city_id.*' => 'required'
            //'*.city'=>'required|array',
            //'*.city'=>'required',
            /*'department'=>'required',
            'father_name'=>'required',
            'blood_group'=>'required',
            'material_status'=>'required',
            'profile'=>'required', */

        ];
    }

    public function messages()
    {
        return [
            'city_id.*.required' => 'City is required'
        ];
    }
}
