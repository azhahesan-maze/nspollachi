<?php

namespace App\Http\Controllers;

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
    
}
