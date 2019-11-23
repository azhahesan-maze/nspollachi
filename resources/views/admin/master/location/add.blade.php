@extends('admin.layout.app')
@section('content')
<div class="col-12 body-sec">
  <div class="card container px-0">
    <!-- card header start@ -->
    <div class="card-header px-2">
      <div class="row">
        <div class="col-4">
          <h3>Add Location</h3>
        </div>
        <div class="col-8 mr-auto">
          <ul class="h-right-btn mb-0 pl-0">
            <li><button type="button" class="btn btn-success"><a href="{{url('master/location')}}">Back</a></button></li>
          </ul>
        </div>
      </div>
    </div>
    <!-- card header end@ -->
    <div class="card-body">
    
      <form  method="post" class="form-horizontal needs-validation" novalidate action="{{url('master/location/store')}}" enctype="multipart/form-data">
      {{csrf_field()}}

        <div class="form-row">
          <div class="col-md-6">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Location Name <span class="mandatory">*</span></label>
              <div class="col-sm-8">
                <input type="text" class="form-control name only_allow_alp_num_dot_com_amp" placeholder="Location Name" name="name" value="{{old('name')}}" required>
                <span class="mandatory"> {{ $errors->first('name')  }} </span>
                <div class="invalid-feedback">
                  Enter valid Location Name
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Location Type <span class="mandatory">*</span></label>
              <div class="col-sm-8">
                <select class="js-example-basic-multiple col-12 custom-select location_type_id" name="location_type_id" required>
                  <option value="">Choose Location Type</option>
                  @foreach($location_type as $value)
                  <option value="{{ $value->id }}" {{ old('location_type_id') == $value->id ? 'selected' : '' }}>{{ $value->name }}</option>
                  @endforeach
                </select>
                <span class="mandatory"> {{ $errors->first('location_type_id')  }} </span>
                <div class="invalid-feedback">
                  Enter valid Location Type
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Address Line 1 <span class="mandatory">*</span></label>
              <div class="col-sm-8">
                <input type="text" class="form-control address_line_1" placeholder="Address Line 1" name="address_line_1" value="{{old('address_line_1')}}" required>
                <span class="mandatory"> {{ $errors->first('address_line_1')  }} </span>
                <div class="invalid-feedback">
                Enter valid Address
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Address Line 2 </label>
              <div class="col-sm-8">
                <input type="text" class="form-control address_line_2" placeholder="Address Line 2" name="address_line_2" value="{{old('address_line_2')}}">
                <span class="mandatory"> {{ $errors->first('address_line_2')  }} </span>
                <div class="invalid-feedback">
                Enter valid Address
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group row">
              <label for="land_mark" class="col-sm-4 col-form-label">Land Mark </label>
              <div class="col-sm-8">
                <input type="text" class="form-control land_mark" placeholder="Land Mark" name="land_mark" value="{{old('land_mark')}}">
                <span class="mandatory"> {{ $errors->first('land_mark')  }} </span>
                <div class="invalid-feedback">
                Enter valid Land Mark
                </div>
              </div>
            </div>
          </div>

          
          <div class="col-md-6">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">State <span class="mandatory">*</span></label>
              <div class="col-sm-8">
                <select class="js-example-basic-multiple col-12 custom-select state_id" name="state_id" required>
                  <option value="">Choose State</option>
                  @foreach($state as $value)
                  <option value="{{ $value->id }}" {{ old('state_id') == $value->id ? 'selected' : '' }}>{{ $value->name }}</option>
                  @endforeach
                </select>
                <span class="mandatory"> {{ $errors->first('state_id')  }} </span>
                <div class="invalid-feedback">
                  Enter valid State 
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">District </label>
              <div class="col-sm-8">
                <select class="js-example-basic-multiple col-12 custom-select district_id" name="district_id">
                  <option value="">Choose District</option>
                  
                </select>
                <span class="mandatory"> {{ $errors->first('district_id')  }} </span>
                <div class="invalid-feedback">
                  Enter valid District
                </div>
              </div>
            </div>
          </div>


          
          <div class="col-md-6">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">City </label>
              <div class="col-sm-8">
                <select class="js-example-basic-multiple col-12 custom-select city_id" name="city_id" >
                  <option value="">Choose City</option>
                  
                </select>
                <span class="mandatory"> {{ $errors->first('city_id')  }} </span>
                <div class="invalid-feedback">
                  Enter valid City
                </div>
              </div>
            </div>
          </div>


          <div class="col-md-6">
            <div class="form-group row">
              <label for="land_mark" class="col-sm-4 col-form-label">Postal Code <span class="mandatory">*</span></label>
              <div class="col-sm-8">
                <input type="text" class="form-control postal_code" placeholder="Postal Code" name="postal_code" value="{{old('postal_code')}}" required>
                <span class="mandatory"> {{ $errors->first('postal_code')  }} </span>
                <div class="invalid-feedback">
                  Enter valid Postal Code
                </div>
              </div>
            </div>
          </div>

        </div>
        <div class="col-md-7 text-right">
          <button class="btn btn-success" name="add" type="submit">Submit</button>
        </div>
      </form>
    </div>
    <!-- card body end@ -->
  </div>
</div>
<script>

function get_state_based_district(state_id,district_id)
{
  $.ajax({
              type: "post",
              url: "{{ url('common/get-state-based-district')}}",
              data: {state_id: state_id,district_id:district_id},
              success: function (res)
              {
                result = JSON.parse(res);
                $(".district_id").html(result.option);
              }
          });

}

function get_district_based_city(district_id,city_id)
{
  $.ajax({
              type: "post",
              url: "{{ url('common/get-district-based-city')}}",
              data: {district_id: district_id,city_id:city_id},
              success: function (res)
              {
                result = JSON.parse(res);
                $(".city_id").html(result.option);
              }
          });

}

$(document).ready(function(){
  var state_id="{{ old('state_id') }}";
  var district_id="{{ old('district_id') }}"; 
  var city_id="{{ old('city_id') }}"; 
 if(state_id != ""){
  get_state_based_district(state_id,district_id);
 }
 if(district_id !=""){
  get_district_based_city(district_id,city_id);
 }

});


  $(document).on("change",".state_id",function(){
    var state_id=$(this).val();
    $(".city_id").html("<option value=''>Choose City</option>");
    get_state_based_district(state_id,"");
    
  });



  $(document).on("change",".district_id",function(){
    var district_id=$(this).val();
    get_district_based_city(district_id,"");
  });


  </script>

@endsection

