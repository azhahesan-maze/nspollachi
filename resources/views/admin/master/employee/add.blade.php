@extends('admin.layout.app')
@section('content')
<div class="col-12 body-sec">
  <div class="card container px-0">
    <!-- card header start@ -->
    <div class="card-header px-2">
      <div class="row">
        <div class="col-4">
          <h3>Add Employee</h3>
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
    
      <form  method="post" class="form-horizontal needs-validation" 
      novalidate action="{{url('master/employee/store')}}" enctype="multipart/form-data">
      {{csrf_field()}}

     
        <div class="form-row">

          <div class="col-md-8">
          <h4>Professional details:</h4>
          </div>
          <div class="col-md-6">
            <!-- <div class="form-group row">
              <label for="validationCustom01" class="col-sm-3 col-form-label">Employee Name <span class="mandatory">*</span></label>
              <div class="col-sm-2">
              <select class="js-example-basic-multiple col-12 custom-select salutation required_for_valid"  error-data="Salutation field is required" placeholder="Choose Salutation" name="salutation">
                  
                  <option value="Mr" {{ old('salutation') == 'Mr' ? 'selected' : '' }}>Mr</option>
                  <option value="Mrs" {{ old('salutation') == 'Mrs' ? 'selected' : '' }} >Mrs</option>
                </select>
                <span class="mandatory"> {{ $errors->first('salutation')  }} </span>
                <div class="invalid-feedback">
                Salutation field is required
                </div>
              </div>
              <div class="col-sm-6">
                <input type="text" class="form-control name only_allow_alp_num_dot_com_amp required_for_valid" error-data="Enter valid Employee Name" placeholder="Employee Name" name="name" value="{{old('name')}}">
                <span class="mandatory"> {{ $errors->first('name')  }} </span>
                <div class="invalid-feedback">
                  Enter valid Employee Name
                </div>
              </div>
            </div> -->
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Employee Name <span class="mandatory">*</span></label>
              <div class="col-sm-8">
            <div class="input-group">
            <div class="input-group-prepend">
              <select class="form-control">
                  <option value="Mr" {{ old('salutation') == 'Mr' ? 'selected' : '' }}>Mr</option>
                  <option value="Mrs" {{ old('salutation') == 'Mrs' ? 'selected' : '' }} >Mrs</option>
              </select>
            </div>
            <input type="text" class="form-control required_for_valid" aria-label="Text input with dropdown button">
          </div>
          </div>
          </div>

          </div>

          @if($errors->has('city'))
          dd($errors)
          @endif




          <div class="col-md-6">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Employee Code <span class="mandatory">*</span></label>
              <div class="col-sm-8">
                <input type="text" class="form-control code only_allow_alp_num_dot_com_amp required_for_valid" error-data="Enter valid Employee Code" placeholder="Employee Code" name="code" value="{{old('code')}}" >
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
                <input type="text" class="form-control phone_no required_for_valid" error-data="Enter valid Phone No" placeholder="Phone No" name="phone_no" value="{{old('phone_no')}}" >
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
                <input type="text" class="form-control email required_for_valid" error_data="Enter valid Email" placeholder="Email" name="email" value="{{old('email')}}" >
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
                <input type="text" class="form-control dob required_for_valid" error-data="Enter valid DOB" placeholder="dd-mm-yyyy" name="dob" value="{{old('dob')}}" >
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

              <select class="js-example-basic-multiple col-12 form-control custom-select department_id required_for_valid" 
              error-data="Enter valid Department" data-placeholder="Choose Department" name="department_id" >
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
 <div class="form-row">
 <div class="col-md-8">
          <h4>Personal Details :</h4>
          </div>

          <div class="col-md-6">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Father's Name <span class="mandatory">*</span></label>
              <div class="col-sm-8">
                <input type="text" class="form-control father_name required_for_valid" error-data="Enter valid Father's Name" placeholder="Father's Name" name="father_name" value="{{old('father_name')}}">
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
                <input type="text" class="form-control blood_group required_for_valid" error-data="Enter valid Blood Group" placeholder="Blood Group" name="blood_group" value="{{old('blood_group')}}" >
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
              <select class="js-example-basic-multiple col-12 form-control material_status select custom-select required_for_valid" 
              error-data="Enter valid Material Status" data-placeholder="Choose Material" name="material_status" >
                  <!-- <option value="Married"  {{ old('material_status') == 'Married' ? 'selected' : '' }}>Married</option>
                  <option value="Single" {{ old('material_status') == 'Single' ? 'selected' : '' }}>Single</option>
                  <option value="Divorced" {{ old('material_status') == 'Divorced' ? 'selected' : '' }}>Divorced</option> -->
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
                <input type="file" class="form-control profile required_for_valid" placeholder="Father's Name" name="profile" value="{{old('profile')}}" >
                <button type="button" id="cus-btn">CHOOSE A FILE</button>
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
                <input type="text" class="form-control father_name required_for_valid" error-data="Enter valid Access No" placeholder="Father's Name" name="father_name" value="{{old('father_name')}}" >
                <span class="mandatory"> {{ $errors->first('city')  }} </span>
                <div class="invalid-feedback">
                  Enter valid Access No
                </div>
              </div>
            </div>
          </div>

          


 </div>

 <div class="form-row">
 <div class="col-md-8">
          <div class="form-group row">
          <div class="col-md-4">
          <label for="validationCustom01" class=" col-form-label">Address details : </label>
              <label for="validationCustom01" class="btn-sm btn-success add_address">Add Address</label>  
          </div>
            </div>
 </div>
          
          </div>
          <div class="common_address_div">
            
            
              @if (old('address_line_1'))
                
              @foreach (old('address_line_1') as $key=>$item)
                            <div class="form-row address_div">
      <div class="col-md-8">
      <h3 class="address_label"></h3>
      </div>
                <div class="col-md-6">
              <div class="form-group row">
                <label for="validationCustom01" class="col-sm-4 col-form-label">Address Type <span class="mandatory">*</span></label>
                <div class="col-sm-8">
                  <select class="js-example-basic-multiple col-12 custom-select address_type_id required_for_valid required_for_address_valid" error-data="Enter valid Address Type">
                    <option value="">Choose Address Type</option>
                    @foreach($address_type as $value)
                    <option value="{{ $value->id }}" >{{ $value->name }}</option>
                    @endforeach
                  </select>
                 <div class="invalid-feedback">
                    Enter valid Address Type
                  </div>
                </div>
              </div>
            </div>
      <div class="col-md-6">
              <div class="form-group row">
                <label for="validationCustom01" class="col-sm-4 col-form-label">Address Line 1 <span class="mandatory">*</span></label>
                <div class="col-sm-8">
                  <input type="text" class="form-control address_line_1 required_for_valid required_for_address_valid" error-data="Enter valid Address" placeholder="Address Line 1" name="address_line_1[]" value="" >
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
                  <input type="text" class="form-control address_line_2" placeholder="Address Line 2" name="address_line_2[]" value="">
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
                  <input type="text" class="form-control land_mark" placeholder="Land Mark" name="land_mark[]" value="">
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
                  <select class="js-example-basic-multiple col-12 custom-select state_id required_for_valid required_for_address_valid" error-data="Enter valid State" name="state_id[]" >
                    <option value="">Choose State</option>
                    @foreach($state as $value)
                    <option value="{{ $value->id }}" >{{ $value->name }}</option>
                    @endforeach
                  </select>
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
                  <select class="js-example-basic-multiple col-12 custom-select district_id" name="district_id[]">
                    <option value="">Choose District</option>
                   </select>
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
                  <select class="js-example-basic-multiple col-12 custom-select city_id" name="city_id[]" >
                    <option value="">Choose City</option>
                  </select>
                  <span class="mandatory"> {{ $errors->first('city_id.'.$key)  }} </span>
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
                  <input type="text" class="form-control postal_code required_for_valid required_for_address_valid" error-data="Enter valid Postal Code" placeholder="Postal Code" name="postal_code[]" value="" >
                <div class="invalid-feedback">
                    Enter valid Postal Code
                  </div>
                </div>
              </div>
            </div>
            </div><hr>
              @endforeach
              @endif

          </div>
        <div class="col-md-7 text-right">
          <button class="btn btn-success submit" name="add" type="button">Submit</button>
        </div>
      </form>
    </div>
    <!-- card body end@ -->
  </div>
</div>
<script>

$(document).on("blur change",".required_for_valid",function(){
  
    
        $(this).removeClass("is-invalid");
           if($(this).val() !=""){
            $(this).removeClass("is-invalid");
            $(this).addClass("is-valid");
        }else{
        
           
            $(this).removeClass("is-valid");
            $(this).addClass("is-invalid");
        }
      
});

function validation(){
       var error_count=0;
       $(".required_for_valid").each(function(){
        $(this).removeClass("is-invalid");
           if($(this).val() !=""){
            $(this).removeClass("is-invalid");
            $(this).addClass("is-valid");
        }else{
           error_count++;
           
            $(this).removeClass("is-valid");
            $(this).addClass("is-invalid");
        }
       });
       return error_count;
   }

   $(document).on("click",".submit",function(){
    var error_count=validation();
    if(error_count == 0){
$("form").submit();
    }

   });


  $(document).on("click",".add_address",function(){
    add_address();
    /*
    var address_type_id=$(".address_type_id").val();
    var address_type_text=$(".address_type_id option:selected").text();
    var exist_address_count=0;
    if(address_type_id == ""){
      exist_address_count++;
      alert("Please Choose Address Type");
      return false;
    }
    if($(".address_type_name").length > 0){
    $(".address_type_name").each(function(){
    
      if($(this).val() == address_type_id){
       // exist_address_count++;
      }
    });
    }

    if(exist_address_count >0){
      alert(address_type_text + "Detail are already Exist");
      return false;
    }else{
      add_address(address_type_id,address_type_text);
    } */
    

  });

  function address_details_validation(){
    var error_count=0;
       $(".required_for_address_valid").each(function(){
        $(this).removeClass("is-invalid");
           if($(this).val() !=""){
            $(this).removeClass("is-invalid");
            $(this).addClass("is-valid");
        }else{
           error_count++;
           
            $(this).removeClass("is-valid");
            $(this).addClass("is-invalid");
        }
       });
       return error_count;
  }

  function add_address(id="",text=""){
    var address_details_validation_count=address_details_validation();
    if(address_details_validation_count == 0){

    
  var address='';
    address+='<div class="form-row address_div">\
    <div class="col-md-8">\
    <h3 class="address_label"></h3>\
    </div>\
              <div class="col-md-6">\
            <div class="form-group row">\
              <label for="validationCustom01" class="col-sm-4 col-form-label">Address Type <span class="mandatory">*</span></label>\
              <div class="col-sm-8">\
                <select class="js-example-basic-multiple col-12 custom-select address_type_id required_for_valid required_for_address_valid" error-data="Enter valid Address Type">\
                  <option value="">Choose Address Type</option>\
                  @foreach($address_type as $value)\
                  <option value="{{ $value->id }}" >{{ $value->name }}</option>\
                  @endforeach\
                </select>\
               <div class="invalid-feedback">\
                  Enter valid Address Type\
                </div>\
              </div>\
            </div>\
          </div>\
    <div class="col-md-6">\
            <div class="form-group row">\
              <label for="validationCustom01" class="col-sm-4 col-form-label">Address Line 1 <span class="mandatory">*</span></label>\
              <div class="col-sm-8">\
                <input type="text" class="form-control address_line_1 required_for_valid required_for_address_valid" error-data="Enter valid Address" placeholder="Address Line 1" name="address_line_1[]" value="" >\
               <div class="invalid-feedback">\
                Enter valid Address\
                </div>\
              </div>\
            </div>\
          </div>\
<div class="col-md-6">\
            <div class="form-group row">\
              <label for="validationCustom01" class="col-sm-4 col-form-label">Address Line 2 </label>\
              <div class="col-sm-8">\
                <input type="text" class="form-control address_line_2" placeholder="Address Line 2" name="address_line_2[]" value="">\
                <div class="invalid-feedback">\
                Enter valid Address\
                </div>\
              </div>\
            </div>\
          </div>\
  <div class="col-md-6">\
            <div class="form-group row">\
              <label for="land_mark" class="col-sm-4 col-form-label">Land Mark </label>\
              <div class="col-sm-8">\
                <input type="text" class="form-control land_mark" placeholder="Land Mark" name="land_mark[]" value="">\
               <div class="invalid-feedback">\
                Enter valid Land Mark\
                </div>\
              </div>\
            </div>\
          </div>\
<div class="col-md-6">\
            <div class="form-group row">\
              <label for="validationCustom01" class="col-sm-4 col-form-label">State <span class="mandatory">*</span></label>\
              <div class="col-sm-8">\
                <select class="js-example-basic-multiple col-12 custom-select state_id required_for_valid required_for_address_valid" error-data="Enter valid State" name="state_id[]" >\
                  <option value="">Choose State</option>\
                  @foreach($state as $value)\
                  <option value="{{ $value->id }}" >{{ $value->name }}</option>\
                  @endforeach\
                </select>\
              <div class="invalid-feedback">\
                  Enter valid State \
                </div>\
              </div>\
            </div>\
          </div>\
<div class="col-md-6">\
            <div class="form-group row">\
              <label for="validationCustom01" class="col-sm-4 col-form-label">District </label>\
              <div class="col-sm-8">\
                <select class="js-example-basic-multiple col-12 custom-select district_id" name="district_id[]">\
                  <option value="">Choose District</option>\
                 </select>\
                 <div class="invalid-feedback">\
                  Enter valid District\
                </div>\
              </div>\
            </div>\
          </div>\
           <div class="col-md-6">\
            <div class="form-group row">\
              <label for="validationCustom01" class="col-sm-4 col-form-label">City </label>\
              <div class="col-sm-8">\
                <select class="js-example-basic-multiple col-12 custom-select city_id" name="city_id[]" >\
                  <option value="">Choose City</option>\
                </select>\
               <div class="invalid-feedback">\
                  Enter valid City\
                </div>\
              </div>\
            </div>\
          </div>\
 <div class="col-md-6">\
            <div class="form-group row">\
              <label for="land_mark" class="col-sm-4 col-form-label">Postal Code <span class="mandatory">*</span></label>\
              <div class="col-sm-8">\
                <input type="text" class="form-control postal_code required_for_valid required_for_address_valid" error-data="Enter valid Postal Code" placeholder="Postal Code" name="postal_code[]" value="" >\
              <div class="invalid-feedback">\
                  Enter valid Postal Code\
                </div>\
              </div>\
            </div>\
          </div>\
          </div><hr>';


          $(".common_address_div").append(address);
          
$(".state_id").each(function(key,index){
  var $tr=$(this).closest(".address_div");
  $(this).addClass("state_"+(key+1));
  $(this).attr('attr-id',(key+1));
  //alert($tr.find(".state_id").attr("class"));
 
  

});

$(".address_label").each(function(key,index){
$(this).html("Address Details - " + (key+1));
});
          $("select").select2();
    }
 }










  $(document).on("change",".state_id",function(){
   var $tr=$(this).closest(".address_div");
   var state_id=$(this).val();
   $tr.find(".city_id").html("<option value=''>Choose City</option>");
    $.ajax({
              type: "post",
              url: "{{ url('common/get-state-based-district')}}",
              data: {state_id: state_id},
              success: function (res)
              {
                result = JSON.parse(res);
              //  alert($tr.find(".state_id").attr("class"));
                $tr.find(".district_id").html(result.option);
                
              }
          });
});



  $(document).on("change",".district_id",function(){
     var $tr=$(this).closest(".address_div");
    var district_id=$(this).val();
    $.ajax({
              type: "post",
              url: "{{ url('common/get-district-based-city')}}",
              data: {district_id: district_id},
              success: function (res)
              {
                result = JSON.parse(res);
                $tr.find(".city_id").html(result.option);
              }
          });


    
  });

</script>
@endsection

