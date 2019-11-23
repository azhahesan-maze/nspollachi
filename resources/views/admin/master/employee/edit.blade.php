@extends('admin.layout.app')
@section('content')
<div class="col-12 body-sec">
  <div class="card container px-0">
    <!-- card header start@ -->
    <div class="card-header px-2">
      <div class="row">
        <div class="col-4">
          <h3>Edit Employee </h3>
        </div>
        <div class="col-8 mr-auto">
          <ul class="h-right-btn mb-0 pl-0">
            <li><button type="button" class="btn btn-success"><a href="{{url('master/employee')}}">Back</a></button></li>
          </ul>
        </div>
      </div>
    </div>
    <!-- card header end@ -->
    <div class="card-body">
    
      <form  method="post" class="form-horizontal needs-validation" novalidate action="{{url('master/employee/update/'.$employee->id)}}" enctype="multipart/form-data">
      {{csrf_field()}}

      <div class="form-row">

<div class="col-md-8">
<h3> <u>Professional details :</u> </h3>
</div>
<div class="col-md-8">
  <div class="form-group row">
    <label for="validationCustom01" class="col-sm-4 col-form-label">Employee Name <span class="mandatory">*</span></label>
    <div class="col-sm-2">
    <select class="js-example-basic-multiple col-12 custom-select salutation" placeholder="Choose Salutation" name="salutation" required>
        <option value="">Choose Salutation</option>
        <option value="Mr" {{ old('salutation' ,$employee->salutation) == 'Mr' ? 'selected' : '' }}>Mr</option>
        <option value="Mrs" {{ old('salutation',$employee->salutation) == 'Mrs' ? 'selected' : '' }} >Mrs</option>
      </select>
      <span class="mandatory"> {{ $errors->first('salutation')  }} </span>
      <div class="invalid-feedback">
      Salutation field is required
      </div>
    </div>
    <div class="col-sm-6">
      <input type="text" class="form-control name only_allow_alp_num_dot_com_amp" placeholder="Employee Name" name="name" value="{{old('name',$employee->name)}}" required>
      <span class="mandatory"> {{ $errors->first('name')  }} </span>
      <div class="invalid-feedback">
        Enter valid Employee Name
      </div>
    </div>
  </div>
</div>



<div class="col-md-6">
  <div class="form-group row">
    <label for="validationCustom01" class="col-sm-4 col-form-label">Employee Code <span class="mandatory">*</span></label>
    <div class="col-sm-8">
      <input type="text" class="form-control code only_allow_alp_num_dot_com_amp" placeholder="Employee Code" name="code" value="{{old('code',$employee->code)}}" required>
      <span class="mandatory"> {{ $errors->first('code')  }} </span>
      <div class="invalid-feedback">
        Enter valid Employee Code
      </div>
    </div>
  </div>
</div>

<div class="col-md-6">
  <div class="form-group row">
    <label for="validationCustom01" class="col-sm-4 col-form-label">Phone No <span class="mandatory">*</span></label>
    <div class="col-sm-8">
      <input type="text" class="form-control phone_no " placeholder="Phone No" name="phone_no" value="{{old('phone_no',$employee->phone)}}" required>
      <span class="mandatory"> {{ $errors->first('phone_no')  }} </span>
      <div class="invalid-feedback">
        Enter valid Phone No
      </div>
    </div>
  </div>
</div>

<div class="col-md-6">
  <div class="form-group row">
    <label for="validationCustom01" class="col-sm-4 col-form-label">Email <span class="mandatory">*</span></label>
    <div class="col-sm-8">
      <input type="text" class="form-control email" placeholder="Email" name="email" value="{{old('email',$employee->email)}}" required>
      <span class="mandatory"> {{ $errors->first('email')  }} </span>
      <div class="invalid-feedback">
        Enter valid Email
      </div>
    </div>
  </div>
</div>

<div class="col-md-6">
  <div class="form-group row">
    <label for="validationCustom01" class="col-sm-4 col-form-label">DOB <span class="mandatory">*</span></label>
    <div class="col-sm-8">
      
      <input type="text" class="form-control dob" placeholder="dd-mm-yyyy" name="dob" value="{{old('dob',$employee->dob)}}" required>
      <span class="mandatory"> {{ $errors->first('dob')  }} </span>
      <div class="invalid-feedback">
        Enter valid DOB
      </div>
    </div>
  </div>
</div>

<div class="col-md-6">
  <div class="form-group row">
    <label for="validationCustom01" class="col-sm-4 col-form-label">Department <span class="mandatory">*</span></label>
    <div class="col-sm-8">

    <select class="js-example-basic-multiple col-12 custom-select department_id" placeholder="Choose Department" name="department_id" required>
        <option value="">Choose Department</option>
        @foreach($department as $value)
        <option value="{{ $value->id}}" {{ old('department_id') == $value->id  ? 'selected' : '' }}>{{$value->name}}</option>
        @endforeach
       
    </select>
     
      <span class="mandatory"> {{ $errors->first('department_id')  }} </span>
      <div class="invalid-feedback">
        Enter valid Department
      </div>
    </div>
  </div>
</div>
</div>
<div class="row">
<div class="col-md-8">
<h3> <u>Personal Details :</u> </h3>
</div>

<div class="col-md-6">
  <div class="form-group row">
    <label for="validationCustom01" class="col-sm-4 col-form-label">Father's Name <span class="mandatory">*</span></label>
    <div class="col-sm-8">
      <input type="text" class="form-control father_name" placeholder="Father's Name" name="father_name" value="{{old('father_name')}}">
      <span class="mandatory"> {{ $errors->first('father_name')  }} </span>
      <div class="invalid-feedback">
        Enter valid Father's Name
      </div>
    </div>
  </div>
</div>

<div class="col-md-6">
  <div class="form-group row">
    <label for="validationCustom01" class="col-sm-4 col-form-label">Blood Group <span class="mandatory">*</span></label>
    <div class="col-sm-8">
      <input type="text" class="form-control blood_group" placeholder="Blood Group" name="blood_group" value="{{old('blood_group')}}" >
      <span class="mandatory"> {{ $errors->first('blood_group')  }} </span>
      <div class="invalid-feedback">
        Enter valid Blood Group
      </div>
    </div>
  </div>
</div>

<div class="col-md-6">
  <div class="form-group row">
    <label for="validationCustom01" class="col-sm-4 col-form-label">Material Status <span class="mandatory">*</span></label>
    <div class="col-sm-8">
    <select class="js-example-basic-multiple col-12 custom-select material_status" placeholder="Choose Material Status" name="material_status" >
        <option value="">Choose Material Status</option>
        <option value="Married"  {{ old('material_status') == 'Married' ? 'selected' : '' }}>Married</option>
        <option value="Single" {{ old('material_status') == 'Single' ? 'selected' : '' }}>Single</option>
        <option value="Divorced" {{ old('material_status') == 'Divorced' ? 'selected' : '' }}>Divorced</option>
       
     </select>
     
      <span class="mandatory"> {{ $errors->first('material_status')  }} </span>
      <div class="invalid-feedback">
        Enter valid Material Status
      </div>
    </div>
  </div>
</div>

<div class="col-md-6">
  <div class="form-group row">
    <label for="validationCustom01" class="col-sm-4 col-form-label">Photo <span class="mandatory">*</span></label>
    <div class="col-sm-8">
      <input type="file" class="form-control profile" placeholder="Father's Name" name="profile" value="{{old('profile')}}" >
      <span class="mandatory"> {{ $errors->first('profile')  }} </span>
      <div class="invalid-feedback">
        Enter valid profile
      </div>
    </div>
  </div>
</div>

<div class="col-md-6">
  <div class="form-group row">
    <label for="validationCustom01" class="col-sm-4 col-form-label">Access No <span class="mandatory">*</span></label>
    <div class="col-sm-8">
      <input type="text" class="form-control father_name" placeholder="Father's Name" name="father_name" value="{{old('father_name')}}" >
      <span class="mandatory"> {{ $errors->first('father_name')  }} </span>
      <div class="invalid-feedback">
        Enter valid Father's Name
      </div>
    </div>
  </div>
</div>




</div>
        <div class="col-md-7 text-right">
          <button class="btn btn-success" type="submit">Submit</button>
        </div>
      </form>
    </div>
    <!-- card body end@ -->
  </div>
</div>
@endsection