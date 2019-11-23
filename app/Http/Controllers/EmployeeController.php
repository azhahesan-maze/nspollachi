<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

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
        return view('admin.master.employee.add',compact('department'));
    }

   
    public function store(Request $request)
    {
       
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:employees,name,NULL,id,deleted_at,NULL',
            'code' => 'required|unique:employees,code,NULL,id,deleted_at,NULL',
            'phone_no' => 'required|unique:employees,code,NULL,id,deleted_at,NULL',
            'email' => 'required|unique:employees,code,NULL,id,deleted_at,NULL',
            'salutation'=>'required',
            'dob'=>'required',
            /*'department'=>'required',
            'father_name'=>'required',
            'blood_group'=>'required',
            'material_status'=>'required',
            'profile'=>'required', */

        ])->validate();

        $employee = new Employee();
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
        $employee->created_by = 0;
        $employee->updated_by = 0;
      if ($employee->save()) {
            return Redirect::back()->with('success', 'Successfully created');
        } else {
            return Redirect::back()->with('failure', 'Something Went Wrong..!');
        }
    }

    public function show(Employee $employee,$id)
    {
        $employee=Employee::find($id);
        return view('admin.master.employee.show',compact('employee'));
    }

   
    public function edit(Employee $employee,$id)
    {
        $employee=Employee::find($id);
        $department=Department::all();
        return view('admin.master.employee.edit',compact('employee','department'));
    }

    
    public function update(Request $request, Employee $employee,$id)
    {
         $validator = Validator::make($request->all(), [
            'name' => 'required|unique:employees,name,NULL,id,deleted_at,NULL',
            'code' => 'required|unique:employees,code,NULL,id,deleted_at,NULL',
        ])->validate();

        $employee =Employee::find($id);
        $employee->name       = $request->name;
        $employee->code      =  $request->code;
        $employee->created_by = 0;
        $employee->updated_by = 0;
      if ($employee->save()) {
            return Redirect::back()->with('success', 'Successfully created');
        } else {
            return Redirect::back()->with('failure', 'Something Went Wrong..!');
        }
    }

   
    public function destroy(Employee $employee,$id)
    {
        $employee = Employee::find($id);
        if ($employee->delete()) {
            return Redirect::back()->with('success', 'Deleted successfully');
         }else{
            return Redirect::back()->with('failure', 'Something Went Wrong..!');
        }
    }
}
