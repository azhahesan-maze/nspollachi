<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class ItemRequest extends FormRequest
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
        $rule = [];
        if ($request->has('add')) {
            $rule = [
                'name' => 'required|unique:items,name,NULL,id,deleted_at,NULL',
                'code' => 'required|unique:items,code,NULL,id,deleted_at,NULL',
                'ean' => 'required|unique:items,ean,NULL,id,deleted_at,NULL',
                'ptc' => 'required|unique:items,ptc,NULL,id,deleted_at,NULL',
                'category_id' => 'required',
                'brand_id' => 'required',
               // 'print_name_in_language_3' => 'required',
                'mrp' => 'required',
                'default_selling_price' => 'required',
                'item_type' => 'required',
                'uom_id' => 'required',
                'is_expiry_date' => 'required',
            ];

            if ($request->is_expiry_date == 1) {
                $rule['expiry_date'] = 'required';
            }
        } else if ($request->has('add_uom_factor')) {

            $rule = [
                'item_id' => 'required',
                'category_id' => 'required',
                'default_uom_id' => 'required',

            ];

            if ($request->has('uom_id')) {
                $rule['uom_id.*'] = 'required|unique:uom_factor_convertion_for_items,uom_id,NULL,id,deleted_at,NULL,item_id,' . $this->item_id;
            }

            if ($request->has('old_uom_id')) {
                foreach ($request->old_uom_id as $key => $value) {

                    $rule['old_uom_id.' . $key] = 'required|unique:uom_factor_convertion_for_items,uom_id,' . $this->uom_factor_convertion_id[$key] . ',id,deleted_at,NULL,item_id,' . $this->item_id;
                }
            }

            if ($request->has('convertion_factor')) {
                foreach ($request->convertion_factor as $key => $value) {
                    $rule['convertion_factor.' . $key] = 'required|unique:uom_factor_convertion_for_items,convertion_factor,NULL,id,deleted_at,NULL,item_id,' . $this->item_id . ',uom_id,' . $this->uom_id[$key];
                }
            }

            if ($request->has('old_convertion_factor')) {
                foreach ($request->old_convertion_factor as $key => $value) {
                    $rule['old_convertion_factor.' . $key] = 'required|unique:uom_factor_convertion_for_items,convertion_factor,' . $this->uom_factor_convertion_id[$key] . ',id,deleted_at,NULL,item_id,' . $this->item_id . ',uom_id,' . $this->old_uom_id[$key];
                }
            }



            //echo "<pre>";print_r($rule);exit;
        } else {
            $rule = [
                'name' => 'required|unique:items,name,' . $this->id . ',id,deleted_at,NULL',
                'code' => 'required|unique:items,code,' . $this->id . ',id,deleted_at,NULL',
                'ean' => 'required|unique:items,ean,' . $this->id . ',id,deleted_at,NULL',
                'ptc' => 'required|unique:items,ptc,' . $this->id . ',id,deleted_at,NULL',
                'category_id' => 'required',
                'brand_id' => 'required',
                'ptc' => 'required',
                'ean' => 'required',
                'mrp' => 'required',
                'item_type' => 'required',
                'default_selling_price' => 'required',
                'uom_id' => 'required',
                'is_expiry_date' => 'required',
            ];

            if ($request->is_expiry_date == 1) {
                $rule['expiry_date'] = 'required';
            }
        }
        return $rule;
    }

    public function messages()
    {
        return [
            'uom_id.*.required' => 'Uom field is required',
            'uom_id.*.unique' => ' The Uom Name has already been taken.',
            'convertion_factor.*.required' => 'Convertion Factor field is required',
            'convertion_factor.*.unique' => 'Convertion Factor field  already exist',
            'old_uom_id.*.required' => 'Uom field is required',
            'old_uom_id.*.unique' => ' The Uom Name has already been taken.',
            'old_convertion_factor.*.required' => 'Convertion Factor field is required',
            'old_convertion_factor.*.unique' => 'Convertion Factor field  already exist',

        ];
    }
}
