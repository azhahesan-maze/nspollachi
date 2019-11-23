@extends('admin.layout.app')
@section('content')
<div class="col-12 body-sec">
  <div class="card container px-0">
    <!-- card header start@ -->
    <div class="card-header px-2">
      <div class="row">
        <div class="col-4">
          <h3>Edit City</h3>
        </div>
        <div class="col-8 mr-auto">
          <ul class="h-right-btn mb-0 pl-0">
            <li><button type="button" class="btn btn-success"><a href="{{url('master/city')}}">Back</a></button></li>
          </ul>
        </div>
      </div>
    </div>
    <!-- card header end@ -->
    <div class="card-body">
    
      <form  method="post" class="form-horizontal needs-validation" novalidate action="{{url('master/city/update/'.$city->id)}}" enctype="multipart/form-data">
      {{csrf_field()}}


      <div class="form-row">
          
          <div class="col-md-7">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">State <span class="mandatory">*</span></label>
              <div class="col-sm-8">
                <select class="js-example-basic-multiple col-12 custom-select state_id" name="state_id">
                  <option value="">Choose States</option>
                  @foreach($state as $value)
                      <option value="{{ $value->id }}" {{ old('state_id', $city->state_id) == $value->id ? 'selected' : '' }}>{{ $value->name }}</option>
                   @endforeach
                </select>
                <span class="mandatory"> {{ $errors->first('state_id')  }} </span>
                <div class="invalid-feedback">
                  Enter valid State Code
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-7">
              <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label"> District  {{ $city->district_id }}<span class="mandatory">*</span></label>
              <div class="col-sm-8">
                <select class="js-example-basic-multiple col-12 custom-select district_id" placeholder="Choose District" name="district_id">
                  <option value="">Choose District</option>


                 
                </select>
                <span class="mandatory"> {{ $errors->first('district_id')  }} </span>
                <div class="invalid-feedback">
                  Enter valid State Code
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-7">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">City Name <span class="mandatory">*</span></label>
              <div class="col-sm-8">
                <input type="text" class="form-control name only_allow_alp_num_dot_com_amp" placeholder="District Name" name="name" value="{{old('name',$city->name)}}" required>
                <span class="mandatory"> {{ $errors->first('name')  }} </span>
                <div class="invalid-feedback">
                  Enter valid State Name
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-7">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Remark </label>
              <div class="col-sm-8">
                <input type="text" class="form-control remark" name="remark" value="{{old('remark',$city->remark)}}" placeholder="Remark">
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
<script type="text/javascript">

function get_state_based_district(state_id,district_id)
{
$.ajax({
              type: "post",
              url: "{{ url('common/get-state-based-district')}}",
              data: {state_id: state_id, district_id:district_id},
              success: function (res)
              {
                result = JSON.parse(res);
                $(".district_id").html(result.option);
              }
          });

}

$(document).ready(function(){

  var new_state_id=$(".state_id").val();
  var new_district_id="{{ $city->district_id }}";
  var old_state_id="{{ old('state_id') }}";
  var old_district_id="{{ old('district_id') }}"; 
  var state_id="";
  var district_id ="";
if(old_state_id == ""){
    state_id =new_state_id;
    district_id=new_district_id;
  }else{
    state_id =old_state_id;
    district_id=old_district_id;

  }
if(state_id != ""){
 get_state_based_district(state_id,district_id);
 }

});
$(document).on("change",".state_id",function(){
  var state_id=$(this).val();
  get_state_based_district(state_id,"");
});

 

</script>
@endsection