<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployeeCreateRequest;
use App\Models\AddressDetails;
use App\Models\AddressType;
use App\Models\Department;
use App\Models\Employee;
use App\Models\LocationType;
use App\Models\State;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Image;
use Storage;

class EmployeeController extends Controller
{
    
    public function index()
    {
        $employee=Employee::all();
        return view('admin.master.employee.view',compact('employee'));
    }

   
    public function create()
    {
        $department=Department::all();
        $address_type=AddressType::all();
        $state=State::all();
        return view('admin.master.employee.add',compact('department','address_type','state'));
    }

   
    public function store(EmployeeCreateRequest $request)
    {
        $employee = new Employee();
        $profile_name="";
        $destinationPath = 'storage/employee_profile/';
        if ($request->hasFile('profile')) {
            $profile = $request->file('profile');
            $profile_name = date('Y-m-d').time().'.'.$profile->getClientOriginalExtension();
            $profile->move($destinationPath, $profile_name);
           }

        $employee->salutation       = $request->salutation;
        $employee->name       = $request->name;
        $employee->code      =  $request->code;
        $employee->phone_no      =  $request->phone_no;
        $employee->email      =  $request->email;
        $employee->dob      =  isset($request->dob) && $request->dob !="" ? date('Y-m-d',strtotime($request->dob)) : "" ;
        $employee->department_id      =  $request->department_id;
        $employee->father_name      =  $request->father_name;
        $employee->blood_group      =  $request->blood_group;
        $employee->material_status      =  $request->material_status;
        $employee->access_no      =  $request->access_no;
        $employee->profile      =  $profile_name;
        $employee->created_by = 0;
        $employee->updated_by = 0;




        $now = Carbon::now('Asia/Kolkata')->toDateTimeString();
      if ($employee->save()) {
        $batch_insert_array=array();
        foreach($request->address_type_id as $key=>$value){
            $data_to_store=array(
                'address_table'=>"Emp",
                'address_type_id'=>$request->address_type_id[$key],
                'address_ref_id'=>$employee->id,
                'address_line_1'=>$request->address_line_1[$key],
                'address_line_2'=>$request->address_line_2[$key],
                'land_mark'=>$request->land_mark[$key],
                'country_id'=>$request->country_id[$key],
                'state_id'=>$request->state_id[$key],
                'district_id'=>$request->district_id[$key],
                'city_id'=>$request->city_id[$key],
                'postal_code'=>$request->postal_code[$key],
                'created_by'=>0,
                'updated_by'=>0,
                'created_at'=>$now,
                'updated_at'=>$now,
               );
               $batch_insert_array[]=$data_to_store;
            }
            if(count($batch_insert_array)>0){
                AddressDetails::insert($batch_insert_array);
            }
           


            return Redirect::back()->with('success', 'Successfully created');
        } else {
            return Redirect::back()->with('failure', 'Something Went Wrong..!');
        }
    }

    public function show(Employee $employee,$id)
    {
        $employee=Employee::find($id);
        $employee_address_details=AddressDetails::where('address_ref_id',$id)->where('address_table','Emp')->get();
        return view('admin.master.employee.show',compact('employee','employee_address_details'));
    }

   
    public function edit(Employee $employee,$id)
    {
       $employee=Employee::find($id);
        $department=Department::all();
        $state=State::all();
        $address_type =AddressType::all();
        $employee_address_details=AddressDetails::where('address_ref_id',$id)->where('address_table','Emp')->get();
        return view('admin.master.employee.edit',compact('employee','department','state','employee_address_details','address_type'));
    }

    
    public function update(EmployeeCreateRequest $request, Employee $employee,$id)
    { 
        
        $employee = Employee::find($id);
        $profile_name=$employee->profile;
        $destinationPath = 'storage/employee_profile/';
        if ($request->hasFile('profile')) {
            if(file_exists($destinationPath.$profile_name)){
                @unlink($destinationPath.$profile_name);
            }
            $profile = $request->file('profile');
            $profile_name = date('Y-m-d').time().'.'.$profile->getClientOriginalExtension();
           
            $profile->move($destinationPath, $profile_name);
          
           }

   
    $employee->salutation       = $request->salutation;
    $employee->name       = $request->name;
    $employee->code      =  $request->code;
    $employee->phone_no      =  $request->phone_no;
    $employee->email      =  $request->email;
    $employee->dob      =  isset($request->dob) && $request->dob !="" ? date('Y-m-d',strtotime($request->dob)) : "" ;
    $employee->department_id      =  $request->department_id;
    $employee->father_name      =  $request->father_name;
    $employee->blood_group      =  $request->blood_group;
    $employee->material_status      =  $request->material_status;
    $employee->access_no      =  $request->access_no;
    $employee->profile      =  $profile_name;
    $employee->created_by = 0;
    $employee->updated_by = 0;
    $now = Carbon::now('Asia/Kolkata')->toDateTimeString();
      if ($employee->save()) {
        $batch_insert_array=array();

        /* Insert New Address Details Start Here */
        if(isset($request->address_type_id)){
        foreach($request->address_type_id as $key=>$value){
            $data_to_store=array(
                'address_table'=>"Emp",
                'address_type_id'=>$request->address_type_id[$key],
                'address_ref_id'=>$employee->id,
                'address_line_1'=>$request->address_line_1[$key],
                'address_line_2'=>$request->address_line_2[$key],
                'land_mark'=>$request->land_mark[$key],
                'country_id'=>$request->country_id[$key],
                'state_id'=>$request->state_id[$key],
                'district_id'=>$request->district_id[$key],
                'city_id'=>$request->city_id[$key],
                'postal_code'=>$request->postal_code[$key],
                'created_by'=>0,
                'updated_by'=>0,
                'created_at'=>$now,
                'updated_at'=>$now,
               );
               $batch_insert_array[]=$data_to_store;
            }
            if(count($batch_insert_array)>0){
                AddressDetails::insert($batch_insert_array);
            }
        }
         /* Insert New Address Details End Here */

         /* Update Existing Address Deatils Start Here */
         if(isset($request->old_address_type_id)){
            foreach($request->old_address_type_id as $key=>$value){
                $address_details=AddressDetails::find($request->address_details_id[$key]);

                $address_details->address_table="Emp";
                $address_details->address_type_id=$request->old_address_type_id[$key];
                $address_details->address_ref_id=$employee->id;
                $address_details->address_line_1=$request->old_address_line_1[$key];
                $address_details->address_line_2=$request->old_address_line_2[$key];
                $address_details->land_mark=$request->old_land_mark[$key];
                $address_details->country_id=$request->old_country_id[$key];
                $address_details->state_id=$request->old_state_id[$key];
                $address_details->district_id=$request->old_district_id[$key];
                $address_details->city_id=$request->old_city_id[$key];
                $address_details->postal_code=$request->old_postal_code[$key];
                $address_details->created_by=0;
                $address_details->updated_by=0;
                $address_details->created_at=$now;
                $address_details->updated_at=$now;
                $address_details->save();   
                }
                
            }
         /* Update Existing Address Detils End Here */






            return Redirect::back()->with('success', 'Successfully created');
        } else {
            return Redirect::back()->with('failure', 'Something Went Wrong..!');
        }
    }

   
    public function destroy(Employee $employee,$id)
    {
        $employee = Employee::where('employees.id',$id)->delete();
        if ($employee) {
            return Redirect::back()->with('success', 'Deleted successfully');
         }else{
            return Redirect::back()->with('failure', 'Something Went Wrong..!');
        }
    }

    public function delete_employee_address_details(Request $request){
        $address_details_id=$request->address_details_id;
        $address_details=AddressDetails::find($address_details_id);
        if($address_details->delete()){
             echo 1;
        }else{
            echo 0;
        }


    }
}
