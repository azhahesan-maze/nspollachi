<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

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
    public function rules(Request $request)
    {
        $rule=[];
        if($request->has('add')){
            $rule=array(
                'name' => 'required|unique:employees,name,NULL,id,deleted_at,NULL',
                'code' => 'required|unique:employees,code,NULL,id,deleted_at,NULL',
                'phone_no' => 'required|unique:employees,phone_no,NULL,id,deleted_at,NULL',
                'email' => 'required|unique:employees,email,NULL,id,deleted_at,NULL',
                'salutation'=>'required',
                'dob'=>'required',
                'address_type_id .*' => 'required',
                'address_line_1.*' => 'required',
                'state_id.*' => 'required',
                'postal_code.*' => 'required',
            );

        }else{

            $rule=array(
                'name' => 'required|unique:employees,name,'.$this->id.',id,deleted_at,NULL',
                'code' => 'required|unique:employees,code,'.$this->id.',id,deleted_at,NULL',
                'phone_no' => 'required|unique:employees,phone_no,'.$this->id.',id,deleted_at,NULL',
                'email' => 'required|unique:employees,email,'.$this->id.',id,deleted_at,NULL',
                'salutation'=>'required',
                'dob'=>'required',
                'address_type_id .*' => 'required',
                
            );
            if($request->has('address_type_id')){
                $rule['address_type_id .*']='required';
                $rule['address_line_1.*'] = 'required';
                $rule['state_id.*'] = 'required';
                $rule['postal_code.*'] = 'required';

            }

            if($request->has('old_address_type_id')){
                $rule['old_address_type_id .*']='required';
                $rule['old_address_line_1.*'] = 'required';
                $rule['old_state_id.*'] = 'required';
                $rule['old_postal_code.*'] = 'required';

            }
            


        }
        

        return $rule;

       
        // return [
           
        //     //'city_id.*' => 'required',
           
        //     //'*.city'=>'required|array',
        //     //'*.city'=>'required',
        //     /*'department'=>'required',
        //     'father_name'=>'required',
        //     'blood_group'=>'required',
        //     'material_status'=>'required',
        //     'profile'=>'required', */

        // ];


    }

    public function messages()
    {
        return [
            'city_id.*.required' => 'City field is required',
            'address_type_id.*.required' => 'Address Type  field is required',
            'address_line_1.*.required' => 'Address Line  field is required',
            'state_id.*.required' => 'State field is required',
            'postal_code.*.required' => 'Postal Code field is required',
            'old_city_id.*.required' => 'City field is required',
            'old_address_type_id.*.required' => 'Address Type  field is required',
            'old_address_line_1.*.required' => 'Address Line  field is required',
            'old_state_id.*.required' => 'State field is required',
            'old_postal_code.*.required' => 'Postal Code field is required',
        ];
    }
}
