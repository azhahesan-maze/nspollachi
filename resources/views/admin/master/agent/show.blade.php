@extends('admin.layout.app')
@section('content')
<div class="col-12 body-sec">
  <div class="card container px-0">
    <!-- card header start@ -->
    <div class="card-header px-2">
      <div class="row">
        <div class="col-4">
          <h3>View Employee</h3>
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
      <div class="form-row">
        <div class="col-md-6">
          <div class="form-group row">
            <label for="validationCustom01" class="col-sm-4 col-form-label">Employee Name :</label>
            <label for="validationCustom01" class="col-sm-4 col-form-label"> {{ $employee->salutation }}. {{ $employee->name }}</label>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group row">
            <label for="validationCustom01" class="col-sm-4 col-form-label">Employee Code :</label>
            <label for="validationCustom01" class="col-sm-4 col-form-label">{{ $employee->code }} </label>
          </div>
        </div>

        <div class="col-md-6">
          <div class="form-group row">
            <label for="validationCustom01" class="col-sm-4 col-form-label">Phone No :</label>
            <label for="validationCustom01" class="col-sm-4 col-form-label">{{ $employee->phone_no }} </label>
          </div>
        </div>

        <div class="col-md-6">
          <div class="form-group row">
            <label for="validationCustom01" class="col-sm-4 col-form-label">Email :</label>
            <label for="validationCustom01" class="col-sm-4 col-form-label">{{ $employee->email }} </label>
          </div>
        </div>

        

        
        <div class="col-md-6">
          <div class="form-group row">
            <label for="validationCustom01" class="col-sm-4 col-form-label">Department :</label>
            <label for="validationCustom01" class="col-sm-4 col-form-label">{{ $employee->department->name }} </label>
          </div>
        </div>
    </div>
    
    <div class="form-row">
        <div class="col-md-8">
        <h4> Address Details :</h4>
        </div>
      </div>
      <hr>
    @foreach ($employee_address_details as $key=>$values)
    <div class="form-row">
        <div class="col-md-8">
            <h4> Address Details  - {{ ($key+1 )}} </h4>
            </div>
        <div class="col-md-6">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Address Type :</label>
              <label for="validationCustom01" class="col-sm-4 col-form-label">{{ $values->address_type->name }} </label>
            </div>
          </div>
          <div class="col-md-6">
              <div class="form-group row">
                <label for="validationCustom01" class="col-sm-4 col-form-label">Address Line 1:</label>
                <label for="validationCustom01" class="col-sm-4 col-form-label">{{ $values->address_line_1 }} </label>
              </div>
            </div>
            <div class="col-md-6">
                <div class="form-group row">
                  <label for="validationCustom01" class="col-sm-4 col-form-label">Address Line 2 :</label>
                  <label for="validationCustom01" class="col-sm-4 col-form-label">{{ $values->address_line_2 }} </label>
                </div>
              </div>
              <div class="col-md-6">
                  <div class="form-group row">
                    <label for="validationCustom01" class="col-sm-4 col-form-label">Land Mark:</label>
                    <label for="validationCustom01" class="col-sm-4 col-form-label">{{ $values->land_mark }} </label>
                  </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group row">
                      <label for="validationCustom01" class="col-sm-4 col-form-label">State :</label>
                      <label for="validationCustom01" class="col-sm-4 col-form-label">{{$values->state->name }} </label>
                    </div>
                  </div>
                  <div class="col-md-6">
                      <div class="form-group row">
                        <label for="validationCustom01" class="col-sm-4 col-form-label">District :</label>
                        <label for="validationCustom01" class="col-sm-4 col-form-label">{{$values->district->name }} </label>
                      </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                          <label for="validationCustom01" class="col-sm-4 col-form-label">City :</label>
                          <label for="validationCustom01" class="col-sm-4 col-form-label">{{ isset($values->city->name) ? $values->city->name : "" }} </label>
                        </div>
                      </div>
                      <div class="col-md-6">
                          <div class="form-group row">
                            <label for="validationCustom01" class="col-sm-4 col-form-label">Postal Code :</label>
                            <label for="validationCustom01" class="col-sm-4 col-form-label">{{ $values->postal_code }} </label>
                          </div>
                        </div>
    </div>
    <hr>
        
    @endforeach
    </div>
    <!-- card body end@ -->
  </div>
</div>
@endsection