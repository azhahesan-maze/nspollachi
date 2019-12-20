<?php

namespace App\Http\Controllers;

use App\Models\AccountType;
use App\Models\AddressType;
use App\Models\Bank;
use App\Models\Bankbranch;
use App\Models\City;
use App\Models\Department;
use App\Models\District;
use App\Models\LocationType;
use App\Models\State;
use Illuminate\Http\Request;

class CommonMasterDetailController extends Controller
{
    public function get_state_master_details()
    {
        $state=State::all();
        echo $this->get_json_details($state,$place_holder="States");
    }
    
    public function get_district_master_details(Request $request)
    {
        $user_input=$request->all();
        $condition=[];
        if(isset($user_input['state_id']) && !empty($user_input['state_id']))
        {
            $condition['state_id']=$user_input['state_id'];
        }

        if(count($condition)>0)
        {
            $district=District::where($condition)->get();
          
        }else{
            $district=District::all();
        }
        
        
        echo $this->get_json_details($district,$place_holder="District");
    }

    public function get_city_master_details(Request $request)
    {
        $user_input=$request->all();
        $condition=[];
        if(isset($user_input['state_id']) && !empty($user_input['state_id']))
        {
            $condition['state_id']=$user_input['state_id'];
        }

        if(isset($user_input['district_id']) && !empty($user_input['district_id']))
        {
            $condition['district_id']=$user_input['district_id'];
        }

        if(count($condition)>0)
        {
            $city=City::where($condition)->get();
          
        }else{
            $city=City::all();
        }
        echo $this->get_json_details($city,$place_holder="City");
    }

    public function get_location_type_master_details()
    {
        $location_type=LocationType::all();
        echo $this->get_json_details($location_type,$place_holder="Location Type");
    }

    public function get_bank_master_details()
    {
        $bank=Bank::all();
        echo $this->get_json_details($bank,$place_holder="Bank");
    }

    public function get_department_master_details()
    {
        $department=Department::all();
        echo $this->get_json_details($department,$place_holder="Department");
    }

    public function get_address_type_master_details()
    {
        $address_type=AddressType::all();
        echo $this->get_json_details($address_type,$place_holder="Address Type");
    }
    public function get_accounts_type_master_details()
    {
        $account_type=AccountType::all();
        echo $this->get_json_details($account_type,$place_holder="Account Type");
    }

    public function get_bank_branch_master_details(Request $request)
    {
        $user_input=$request->all();
        $condition=[];
        if(isset($user_input['bank_id']) && !empty($user_input['bank_id']))
        {
            $condition['bank_id']=$user_input['bank_id'];
        }
        if(count($condition)>0){
            $bank_branch=Bankbranch::where($condition)->get();
        }else{
            $bank_branch=Bankbranch::all();
        }
        echo $this->get_json_details($bank_branch,$place_holder="Branch",$name="branch");
    }

    

    public function get_json_details($master_data=array(),$id="",$name="",$code="",$selected_id="",$place_holder="")
    {
        $option = "";
        $option .= count($master_data) > 0 ? "<option value=''> Choose ".$id."  </option>" : "<option value=''> No Result Found </option>";
        $select = "";
        foreach ($master_data as $value) 
        {
            $names=$name !="" ? $value->$name: $value->name;
            if ($selected_id != "") 
            {
                $select = $selected_id == $value->id ? "Selected" : "";
            } else {
                $select = "";
            }
            $option .= "<option value=" . $value->id . "   " . $select . ">" . $names . "</option>";
        }
    
         // return json_encode(array("option" => $option));
         return $option;
    }


}
