<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Request;

class CustomerRequest extends FormRequest
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
        //echo "<pre>";print_r($request->all());exit;
        $rule=[];
        if($request->has('name')){
            $rule=array(
                'name' => 'required|unique:customers,name,NULL,id,deleted_at,NULL',
                'phone_no' => 'required|unique:customers,phone_no,NULL,id,deleted_at,NULL',
                'email' => 'required|unique:customers,email,NULL,id,deleted_at,NULL',
                'pan_card' => 'required|unique:customers,pan_card,NULL,id,deleted_at,NULL',
                'gst_no' => 'required|unique:customers,gst_no,NULL,id,deleted_at,NULL',
                'max_credit_limit'=>'required',
                'max_credit_days'=>'required',
                'opening_balance'=>'required',
                'price_level'=>'required',
                'address_type_id .*' => 'required',
                'address_line_1.*' => 'required',
                'state_id.*' => 'required',
                'postal_code.*' => 'required',
                'bank_id.*' => 'required',
                'branch_id.*' => 'required',
                'ifsc.*' => 'required',
                'account_type_id.*' => 'required',
                'account_holder_name.*' => 'required',
                'account_no.*' => 'required',
             );
}else{
            

            $rule=array(
                'name' => 'required|unique:customers,name,NULL,id,deleted_at,NULL',
                'phone_no' => 'required|unique:customers,phone_no,NULL,id,deleted_at,NULL',
                'email' => 'required|unique:customers,email,NULL,id,deleted_at,NULL',
                'pan_card' => 'required|unique:customers,pan_card,NULL,id,deleted_at,NULL',
                'gst_no' => 'required|unique:customers,gst_no,NULL,id,deleted_at,NULL',
                'max_credit_limit'=>'required',
                'max_credit_days'=>'required',
                'opening_balance'=>'required',
                'price_level'=>'required',
                
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

            if($request->has('bank_id')){

                $rule['bank_id.*'] = 'required';
                $rule['branch_id.*'] = 'required';
                $rule['ifsc.*'] = 'required';
                $rule['account_type_id.*'] = 'required';
                $rule['account_holder_name.*'] = 'required';
                $rule['account_no.*'] = 'required';

            }

            if($request->has('old_bank_id')){

                $rule['old_bank_id.*'] = 'required';
                $rule['old_branch_id.*'] = 'required';
                $rule['old_ifsc.*'] = 'required';
                $rule['old_account_type_id.*'] = 'required';
                $rule['old_account_holder_name.*'] = 'required';
                $rule['old_account_no.*'] = 'required';

            }

                   
           
            


        }
        

        return $rule;
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
            'bank_id.*.required' => 'Bank field is required',
            'branch_id.*.required' => 'Branch field is required',
            'ifsc.*.required' => 'IFSC field is required',
            'account_type_id.*.required' => 'Account Type field is required',
            'account_holder_name.*.required' => 'Account Holder Name Type field is required',
            'account_no.*.required' => 'Account No field is required',
            'old_bank_id.*.required' => 'Bank field is required',
            'old_branch_id.*.required' => 'Branch field is required',
            'old_ifsc.*.required' => 'IFSC field is required',
            'old_account_type_id.*.required' => 'Account Type field is required',
            'old_account_holder_name.*.required' => 'Account Holder Name Type field is required',
            'old_account_no.*.required' => 'Account No field is required',
 ];
    }
}
