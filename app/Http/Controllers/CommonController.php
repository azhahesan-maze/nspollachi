<?php

namespace App\Http\Controllers;

use App\Models\Bankbranch;
use App\Models\Category_two;
use App\Models\City;
use App\Models\District;
use Illuminate\Http\Request;

class CommonController extends Controller
{
    public function get_state_based_district(Request $request)
    {
        $state_id = $request->state_id;
        $district_id = "";
        if ($request->has('district_id')) {
            $district_id = $request->district_id;
        }

        $district = District::where('state_id', $state_id)->get();
        $option = "";
        $option .= count($district) > 0 ? "<option value=''> Choose District </option>" : "<option value=''> No Result Found </option>";
        $select = "";
        foreach ($district as $value) {
            if ($district_id != "") {
                $select = $district_id == $value->id ? "Selected" : "";
            } else {
                $select = "";
            }
            $option .= "<option value=" . $value->id . "   " . $select . ">" . $value->name . "</option>";
        }

        die(json_encode(array(
            "option" => $option
        )));
    }

    public function get_district_based_city(Request $request)
    { 
        $district_id = $request->district_id;
        $city_id = "";
        if ($request->has('city_id')) {
            $city_id = $request->city_id;
        }

        $city = City::where('district_id', $district_id)->get();
        $option = "";
        $option .= count($city) > 0 ? "<option value=''> Choose City </option>" : "<option value=''> No Result Found </option>";
        $select = "";
        foreach ($city as $value) {
            if ($city_id != "") {
                $select = $city_id == $value->id ? "Selected" : "";
            } else {
                $select = "";
            }
            $option .= "<option value=" . $value->id . "   " . $select . ">" . $value->name . "</option>";
        }

        die(json_encode(array(
            "option" => $option
        )));
    }

    
    public function get_bank_based_branch(Request $request)
    { 
        $bank_id = $request->bank_id;
        $branch_id = "";
        if ($request->has('branch_id')) {
            $branch_id = $request->branch_id;
        }

        $branch = Bankbranch::where('bank_id', $bank_id)->get();
        $option = "";
        $option .= count($branch) > 0 ? "<option value=''> Choose Branch </option>" : "<option value=''> No Result Found </option>";
        $select = "";
        foreach ($branch as $value) {
            if ($branch_id != "") {
                $select = $branch_id == $value->id ? "Selected" : "";
            } else {
                $select = "";
            }
            $option .= "<option value=" . $value->id . "   " . $select . ">" . $value->branch . "</option>";
        }

        die(json_encode(array(
            "option" => $option
        )));
    }

    public function get_branch_based_ifsc(Request $request)
    { 
        $branch_id = $request->branch_id;
         $ifsc_det = Bankbranch::where('id', $branch_id)->get();
        
         
         $value=count($ifsc_det)>0 ? $ifsc_det[0]->ifsc : "";
         die(json_encode(array(
            "value" => $value
        )));
    }

    public function get_category_one_based_category_two(Request $request)
    {
        $category_one_id = $request->category_one_id;
        $category_two_id = "";
        if ($request->has('category_two_id')) {
            $category_two_id = $request->category_two_id;
        }

        $category_two = Category_two::where('category_one_id', $category_one_id)->get();
        $option = "";
        $option .= count($category_two) > 0 ? "<option value=''> Choose Category 2  </option>" : "<option value=''> No Result Found </option>";
        $select = "";
        foreach ($category_two as $value) {
            if ($category_two_id != "") {
                $select = $category_two_id == $value->id ? "Selected" : "";
            } else {
                $select = "";
            }
            $option .= "<option value=" . $value->id . "   " . $select . ">" . $value->name . "</option>";
        }

        die(json_encode(array(
            "option" => $option
        )));

    }


    
    
}
