@extends('admin.layout.app')
@section('content')
<div class="col-12 body-sec">
  <div class="card container px-0">
    <!-- card header start@ -->
    <div class="card-header px-2">
      <div class="row">
        <div class="col-4">
          <h3>Edit Customer </h3>
        </div>
        <div class="col-8 mr-auto">
          <ul class="h-right-btn mb-0 pl-0">
            <li><button type="button" class="btn btn-success"><a href="{{url('master/customer')}}">Back</a></button></li>
          </ul>
        </div>
      </div>
    </div>
    <!-- card header end@ -->
    <div class="card-body">
    
      <form  method="post" class="form-horizontal needs-validation" novalidate action="{{url('master/customer/update/'.$customer->id)}}" enctype="multipart/form-data">
      {{csrf_field()}}


      <div class="form-row">
         

          <div class="col-md-8">
          <h4>Professional details:</h4>
          </div>
          <div class="col-md-6">
            
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Customer Name <span class="mandatory">*</span></label>
              <div class="col-sm-8">
            <div class="input-group">
            <div class="input-group-prepend">
              <select class="form-control required_for_valid salutation" name="salutation" error-data="Enter valid Salutation" >
                  <option value="Mr" {{ old('salutation',$customer->salutation) == 'Mr' ? 'selected' : '' }}>Mr</option>
                  <option value="Mrs" {{ old('salutation',$customer->salutation) == 'Mrs' ? 'selected' : '' }} >Mrs</option>
              </select>
              <span class="mandatory"> {{ $errors->first('salutation')  }} </span>
            </div>
            <input type="text" class="form-control required_for_valid name" name="name" error-data="Customer Name Field is required" aria-label="Text input with dropdown button" value={{old('name',$customer->name)}}>
            
            <div class="invalid-feedback">
              Enter valid Customer Name
            </div>
            
          </div>
          <span class="mandatory"> {{ $errors->first('name')  }} </span>
          <span class="mandatory"> {{ $errors->first('salutation')  }} </span>
          </div>
          </div>

          </div>


          <div class="col-md-6">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Phone No <span class="mandatory">*</span></label>
              <div class="col-sm-8">
                <input type="text" class="form-control  phone_no only_allow_digit required_for_valid" input-type="phone_no" pattern="[1-9]{1}[0-9]{9}" error-data="Enter valid Phone No" placeholder="Phone No" name="phone_no" value="{{old('phone_no',$customer->phone_no)}}" >
                <span class="mandatory"> {{ $errors->first('phone_no')  }} </span>
                <div class="invalid-feedback">
                  Enter valid Phone No
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Whatsapp No </label>
              <div class="col-sm-8">
                <input type="text" class="form-control whatsapp_no only_allow_digit" input-type="phone_no" pattern="[1-9]{1}[0-9]{9}" error-data="Enter valid Whatsapp No" placeholder="Whatsapp No" name="whatsapp_no" value="{{old('whatsapp_no',$customer->whatsapp_no)}}" >
                <span class="mandatory"> {{ $errors->first('whatsapp_no')  }} </span>
                <div class="invalid-feedback">
                  Enter valid Whatsapp No
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Email <span class="mandatory">*</span></label>
              <div class="col-sm-8">
                <input type="email" class="form-control email required_for_valid" input-type="email" error_data="Enter valid Email" placeholder="Email" name="email" value="{{old('email',$customer->email)}}" >
                <span class="mandatory"> {{ $errors->first('email')  }} </span>
                <div class="invalid-feedback">
                  Enter valid Email
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Pan Card No <span class="mandatory">*</span></label>
              <div class="col-sm-8">
                <input type="text" class="form-control pan_card required_for_valid" input-type="pan_card" error_data="Enter valid Pancard No" placeholder="Pan Card No" name="pan_card" value="{{old('pan_card',$customer->pan_card)}}" >
                <span class="mandatory"> {{ $errors->first('pan_card')  }} </span>
                <div class="invalid-feedback">
                  Enter valid Pan Card
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Gst No <span class="mandatory">*</span></label>
              <div class="col-sm-8">
                <input type="text" class="form-control gst_no required_for_valid" input-type="gst_no" error_data="Enter valid Gst No" placeholder="Gst No" name="gst_no" value="{{old('gst_no',$customer->gst_no)}}" >
                <span class="mandatory"> {{ $errors->first('gst_no')  }} </span>
                <div class="invalid-feedback">
                  Enter valid Gst No
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Maximum Credit Limit  <span class="mandatory">*</span></label>
              <div class="col-sm-8">
                <input type="text" class="form-control max_credit_limit only_allow_digit required_for_valid"  error_data="Enter valid Maximum Credit Limit" placeholder="Maximum Credit Limit" name="max_credit_limit" value="{{old('max_credit_limit',$customer->max_credit_limit)}}" >
                <span class="mandatory"> {{ $errors->first('max_credit_limit')  }} </span>
                <div class="invalid-feedback">
                  Enter valid Maximum Credit Limit
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Maximum Credit Days  <span class="mandatory">*</span></label>
              <div class="col-sm-8">
                <input type="text" class="form-control max_credit_days only_allow_digit required_for_valid"  error_data="Enter valid Maximum Credit Days" placeholder="Maximum Credit Days" name="max_credit_days" value="{{old('max_credit_days',$customer->max_credit_days)}}" >
                <span class="mandatory"> {{ $errors->first('max_credit_days')  }} </span>
                <div class="invalid-feedback">
                  Enter valid Maximum Credit Days
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Opening Balance <span class="mandatory">*</span></label>
              <div class="col-sm-8">
                <input type="text" class="form-control  required_for_valid" input-type="opening_balance" error_data="Enter valid Opening Balance" placeholder="Opening Balance" name="opening_balance" value="{{old('opening_balance',$customer->opening_balance)}}" >
                <span class="mandatory"> {{ $errors->first('opening_balance')  }} </span>
                <div class="invalid-feedback">
                  Enter valid Opening Balance
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Remark</label>
              <div class="col-sm-8">
                <input type="text" class="form-control remark" input-type="remark" error_data="Enter valid Remark" placeholder="Remark" name="remark" value="{{old('remark',$customer->remark)}}" >
                <span class="mandatory"> {{ $errors->first('remark')  }} </span>
                <div class="invalid-feedback">
                  Enter valid Remark
                </div>
              </div>
            </div>
          </div>


          <div class="col-md-6">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Price Level <span class="mandatory">*</span></label>
              <div class="col-sm-8">
              <select class="js-example-basic-multiple col-12 form-control price_level select custom-select required_for_valid" 
              error-data="Enter valid Price Level" data-placeholder="Choose Price Level " name="price_level" >
              <option value=""></option>
                 <option value="1"  {{ old('price_level',$customer->price_level) == '1' ? 'selected' : '' }}>Price Level 1</option>
                  <option value="2" {{ old('price_level',$customer->price_level) == '2' ? 'selected' : '' }}>Price Level 2</option>
                  <option value="3" {{ old('price_level',$customer->price_level) == '3' ? 'selected' : '' }}>Price Level 3</option> 
               </select>
               
                  <span class="mandatory"> {{ $errors->first('price_level')  }} </span>
                  <div class="invalid-feedback">
                    Enter valid Price Level
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
             <!-- Exist Address Details Grid Start Here -->
            @foreach($customer_address_details as $key=>$values)
            <div class="form-row address_div">
                <div class="col-md-7">
                    <div class="form-group row">
                    <div class="col-md-7">
                    <h3 class="address_label"></h3>
                    </div>
                    <div class="col-md-4">
                    <h3 class="address_delete_label"><label class="btn btn-danger remove_address" attr-id="{{$values->id}}"> Delete </label></h3>
                        </div>
                    </div>
                    </div>
                          <div class="col-md-6">
                        <div class="form-group row">
                        <label for="validationCustom01" class="col-sm-4 col-form-label">Address Type <span class="mandatory">*</span></label>
                          <div class="col-sm-8">
                          <select class="js-example-basic-multiple col-12 form-control custom-select old_address_type_id required_for_valid required_for_address_valid" error-data="Enter valid Address Type" name="old_address_type_id[]">
                              <option value="">Choose Address Type</option>
                              @foreach($address_type as $value)
                              <option value="{{ $value->id }}" {{ old('old_address_type_id.'.$key,$values->address_type_id) == $value->id ? 'selected' : '' }} >{{ $value->name }}</option>
                              @endforeach
                            </select>
                            <span class="mandatory"> {{ $errors->first('old_address_type_id.'.$key)  }} </span>
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
                          <input type="text" class="form-control old_address_line_1 required_for_valid required_for_address_valid" error-data="Enter valid Address" placeholder="Address Line 1" name="old_address_line_1[]" value="{{ old('old_address_line_1.'.$key,$values->address_line_1) }}" >
                            <span class="mandatory"> {{ $errors->first('old_address_line_1.'.$key)  }} </span>
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
                            <input type="text" class="form-control old_address_line_2" placeholder="Address Line 2" name="old_address_line_2[]" value="{{ old('old_address_line_2.'.$key,$values->address_line_2) }}">
                            <span class="mandatory"> {{ $errors->first('old_address_line_2.'.$key)  }} </span>
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
                            <input type="text" class="form-control old_land_mark" placeholder="Land Mark" name="old_land_mark[]" value="{{ old('old_land_mark.'.$key,$values->land_mark) }}">
                            <span class="mandatory"> {{ $errors->first('old_land_mark.'.$key)  }} </span>
                            <div class="invalid-feedback">
                            Enter valid Land Mark
                            </div>
                          </div>
                        </div>
                      </div>
                       <!-- Old Values For Dropdown Start Here  -->
              <input type="hidden" class="form-control address_details_id" name="address_details_id[]" value="{{ old('address_details_id.'.$key,$values->id)}}">
              <input type="hidden" class="form-control exist_old_state_id" value="{{ old('old_state_id.'.$key,$values->state_id)}}">
              <input type="hidden" class="form-control exist_old_district_id" value="{{ old('old_district_id.'.$key,$values->district_id)}}">
              <input type="hidden" class="form-control exist_old_city_id" value="{{ old('old_city_id.'.$key,$values->city_id)}}">
                <!-- Old Values For Dropdown End Here  -->
            <div class="col-md-6">
                        <div class="form-group row">
                          <label for="validationCustom01" class="col-sm-4 col-form-label">State <span class="mandatory">*</span></label>
                          <div class="col-sm-8">
                            <select class="js-example-basic-multiple col-12 form-control custom-select state_id old_state_id required_for_valid required_for_address_valid" error-data="Enter valid State" name="old_state_id[]" >
                              <option value="">Choose State</option>
                              @foreach($state as $value)
                              <option value="{{ $value->id }}" {{ old('old_state_id.'.$key,$values->state_id) == $value->id ? 'selected' : '' }}  >{{ $value->name }}</option>
                              @endforeach
                            </select>
                            <span class="mandatory"> {{ $errors->first('old_state_id.'.$key)  }} </span>
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
                            <select class="js-example-basic-multiple col-12 form-control custom-select district_id old_district_id" name="old_district_id[]">
                              <option value="">Choose District</option>
                              </select>
                             <span class="mandatory"> {{ $errors->first('old_district_id.'.$key)  }} </span>
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
                            <select class="js-example-basic-multiple col-12 form-control custom-select city_id old_city_id" name="old_city_id[]" >
                              <option value="">Choose City</option>
                            </select>
                            <span class="mandatory"> {{ $errors->first('old_city_id.'.$key)  }} </span>
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
                          <input type="text" class="form-control old_postal_code  only_allow_digit required_for_valid required_for_address_valid" error-data="Enter valid Postal Code" placeholder="Postal Code" name="old_postal_code[]" value="{{ old('old_postal_code.'.$key,$values->postal_code) }}" >
                            <span class="mandatory"> {{ $errors->first('old_postal_code.'.$key)  }} </span>
                            <div class="invalid-feedback">
                              Enter valid Postal Code
                            </div>
                          </div>
                        </div>
                      </div>
                      </div><hr>

            @endforeach
            <!-- Exist Address Details Grid End Here -->

            <!-- Set Old Values for Address Details Grid Newly Added Row Start Here -->
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
                          <select class="js-example-basic-multiple col-12 form-control custom-select address_type_id required_for_valid required_for_address_valid" error-data="Enter valid Address Type" name="address_type_id[]">
                              <option value="">Choose Address Type</option>
                              @foreach($address_type as $value)
                              <option value="{{ $value->id }}" {{ old('address_type_id.'.$key) == $value->id ? 'selected' : '' }} >{{ $value->name }}</option>
                              @endforeach
                            </select>
                            <span class="mandatory"> {{ $errors->first('address_type_id.'.$key)  }} </span>
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
                          <input type="text" class="form-control address_line_1 required_for_valid required_for_address_valid" error-data="Enter valid Address" placeholder="Address Line 1" name="address_line_1[]" value="{{ old('address_line_1.'.$key) }}" >
                            <span class="mandatory"> {{ $errors->first('address_line_1.'.$key)  }} </span>
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
                            <input type="text" class="form-control address_line_2" placeholder="Address Line 2" name="address_line_2[]" value="{{ old('address_line_2.'.$key) }}">
                            <span class="mandatory"> {{ $errors->first('address_line_2.'.$key)  }} </span>
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
                            <input type="text" class="form-control land_mark" placeholder="Land Mark" name="land_mark[]" value="{{ old('land_mark.'.$key) }}">
                            <span class="mandatory"> {{ $errors->first('land_mark.'.$key)  }} </span>
                            <div class="invalid-feedback">
                            Enter valid Land Mark
                            </div>
                          </div>
                        </div>
                      </div>
                <!-- Old Values For Dropdown Start Here  -->
          <input type="hidden" class="form-control new_old_state_id" value="{{ old('state_id.'.$key)}}">
          <input type="hidden" class="form-control new_old_district_id" value="{{ old('district_id.'.$key)}}">
          <input type="hidden" class="form-control new_old_city_id" value="{{ old('city_id.'.$key)}}">
            <!-- Old Values For Dropdown End Here  -->
            <div class="col-md-6">
                        <div class="form-group row">
                          <label for="validationCustom01" class="col-sm-4 col-form-label">State <span class="mandatory">*</span></label>
                          <div class="col-sm-8">
                            <select class="js-example-basic-multiple col-12 form-control custom-select state_id required_for_valid required_for_address_valid" error-data="Enter valid State" name="state_id[]" >
                              <option value="">Choose State</option>
                              @foreach($state as $value)
                              <option value="{{ $value->id }}" {{ old('state_id.'.$key) == $value->id ? 'selected' : '' }}  >{{ $value->name }}</option>
                              @endforeach
                            </select>
                            <span class="mandatory"> {{ $errors->first('state_id.'.$key)  }} </span>
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
                            <select class="js-example-basic-multiple col-12 form-control custom-select district_id" name="district_id[]">
                              <option value="">Choose District</option>
                              </select>
                             <span class="mandatory"> {{ $errors->first('district_id.'.$key)  }} </span>
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
                            <select class="js-example-basic-multiple col-12 form-control custom-select city_id" name="city_id[]" >
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
                          <input type="text" class="form-control postal_code only_allow_digit required_for_valid required_for_address_valid" error-data="Enter valid Postal Code" placeholder="Postal Code" name="postal_code[]" value="{{ old('postal_code.'.$key) }}" >
                            <span class="mandatory"> {{ $errors->first('postal_code.'.$key)  }} </span>
                            <div class="invalid-feedback">
                              Enter valid Postal Code
                            </div>
                          </div>
                        </div>
                      </div>
                      </div><hr>
            @endforeach
            @endif

            <!-- Set Old Values for Address Details Grid Newly Added Row End Here -->

           </div>

           <div class="form-row">
              <div class="col-md-8">
                       <div class="form-group row">
                       <div class="col-md-4">
                       <label for="validationCustom01" class=" col-form-label"><h4>Bank Details :</h4> </label>
                           
                       </div>
                         </div>
              </div>
              <div class="col-md-12">
                <table class="table">
                  <thead>
                      <th>S.no</th>
                      <th> Bank   Name</th>
                      <th> Branch Name</th>
                      <th> Ifsc Code </th>
                      <th>Account Type </th>
                      <th>Account Holder Name </th>
                      <th>Account No </th>
                      <th>Action</th>
                 </thead>
                 <tbody class="append_bank_details">

                  @foreach ($customer_bank_details as $bank_key=>$bank_value)
                    <tr>
                      <td><span class="bank_s_no"> {{ $bank_key+1}} </span>
                      <input type="hidden" name="bank_details_id[]" value="{{$bank_value->id }}">
                      <input type="hidden" class="exist_old_bank_id" value="{{ old('old_bank_id.'.$bank_key,$bank_value->bank_id)}}">
                      <input type="hidden" class="exist_old_branch_id" value="{{ old('old_branch_id.'.$bank_key,$bank_value->branch_id)}}">
                    </td>

                      <td>
                        <div class="form-group row">
                            <div class="col-sm-12">
                              <select class="js-example-basic-multiple col-12 form-control custom-select bank_id old_bank_id required_for_valid" error-data="Enter valid Bank" name="old_bank_id[]" >
                                <option value="">Choose Bank</option>
                                @foreach($bank as $value)
                                <option value="{{ $value->id }}" {{ old('old_bank_id.'.$bank_key,$bank_value->bank_id) == $value->id ? 'selected' : '' }}  >{{ $value->name }}</option>
                                @endforeach
                              </select>
                              <span class="mandatory"> {{ $errors->first('old_bank_id.'.$bank_key)  }} </span>
                            <div class="invalid-feedback">
                                Enter valid Bank Name 
                              </div>
                            </div>
                          </div>
                       </td>

                       <td>
                        <div class="form-group row">
                            <div class="col-sm-12">
                              <select class="js-example-basic-multiple col-12 form-control custom-select branch_id old_branch_id required_for_valid" error-data="Enter valid Branch Name" name="old_branch_id[]" >
                                <option value="">Choose Branch Name</option>
                                </select>
                              <span class="mandatory"> {{ $errors->first('old_branch_id.'.$bank_key)  }} </span>
                            <div class="invalid-feedback">
                                Enter valid Branch Name 
                              </div>
                            </div>
                          </div>
                       </td>

                       
                      <td>
                        <div class="form-group row">
                          <div class="col-sm-12">
                          <input type="text" class="form-control ifsc old_ifsc" error-data="Enter valid Ifsc Code" readonly placeholder="IFSC Code" name="old_ifsc[]" value="{{ old('old_ifsc.'.$bank_key,$bank_value->ifsc) }}" >
                            <span class="mandatory"> {{ $errors->first('old_ifsc.'.$bank_key)  }} </span>
                            <div class="invalid-feedback">
                              Enter valid IFSC Code
                            </div>
                          </div>
                        </div>
                      </td>

                      <td>
                        <div class="form-group row">
                            <div class="col-sm-12">
                              <select class="js-example-basic-multiple col-12 form-control custom-select account_type_id old_account_type_id required_for_valid" error-data="Enter valid Account Type" name="old_account_type_id[]" >
                                <option value="">Choose Account Type</option>
                                @foreach($account_type as $value)
                                <option value="{{ $value->id }}" {{ old('old_account_type_id.'.$bank_key,$bank_value->account_type_id) == $value->id ? 'selected' : '' }}  >{{ $value->name }}</option>
                                @endforeach
                              </select>
                              <span class="mandatory"> {{ $errors->first('old_account_type_id.'.$bank_key)  }} </span>
                            <div class="invalid-feedback">
                                Enter valid Account Type 
                              </div>
                            </div>
                          </div>
                       </td>

                      <td>
                        <div class="form-group row">
                          <div class="col-sm-12">
                          <input type="text" class="form-control account_holder_name old_account_holder_name " error-data="Enter valid Account Holder Name" placeholder="Account Holder Name" name="old_account_holder_name[]" value="{{ old('old_account_holder_name.'.$bank_key,$bank_value->account_holder_name) }}" >
                            <span class="mandatory"> {{ $errors->first('old_account_holder_name.'.$bank_key)  }} </span>
                            <div class="invalid-feedback">
                              Enter valid Account Holder Name
                            </div>
                          </div>
                        </div>
                      </td>

                      <td>
                        <div class="form-group row">
                          <div class="col-sm-12">
                          <input type="text" class="form-control account_no old_account_no " error-data="Enter valid Account No"  placeholder="Account No" name="old_account_no[]" value="{{ old('old_account_no.'.$bank_key,$bank_value->account_no) }}" >
                            <span class="mandatory"> {{ $errors->first('old_account_no.'.$key)  }} </span>
                            <div class="invalid-feedback">
                              Enter valid Account No
                            </div>
                          </div>
                        </div>
                      </td>
                    <td>
                                <div class="form-group row">
                                    <div class="col-sm-3">
                                    <label class="btn btn-success add_bank_details">+</label>
                                    </div>
                                    <div class="col-sm-3 mx-2">
                                    <label class="btn btn-danger perment_delete_bank" attr-id="{{$bank_value->id}}">-</label>
                                      </div>
                                  </div>
                            </td>

                    </tr>

                    @endforeach

                    @if(old('bank_id'))
                    @foreach (old('bank_id') as $key=>$value)
                    @if($key > 0)

                    <tr>
                        <td><span class="bank_s_no"> 1 </span>
                        
                          <input type="hidden" class="old_bank_id" value="{{ old('bank_id.'.$key)}}">
                          <input type="hidden" class="old_branch_id" value="{{ old('branch_id.'.$key)}}"></td>
  
                        <td>
                          <div class="form-group row">
                              <div class="col-sm-12">
                                <select class="js-example-basic-multiple col-12 form-control custom-select bank_id required_for_valid" error-data="Enter valid Bank" name="bank_id[]" >
                                  <option value="">Choose Bank</option>
                                  @foreach($bank as $value)
                                  <option value="{{ $value->id }}" {{ old('bank_id.'.$key) == $value->id ? 'selected' : '' }}  >{{ $value->name }}</option>
                                  @endforeach
                                </select>
                                <span class="mandatory"> {{ $errors->first('bank_id.'.$key)  }} </span>
                              <div class="invalid-feedback">
                                  Enter valid Bank Name 
                                </div>
                              </div>
                            </div>
                         </td>
  
                         <td>
                          <div class="form-group row">
                              <div class="col-sm-12">
                                <select class="js-example-basic-multiple col-12 form-control custom-select branch_id required_for_valid" error-data="Enter valid Branch Name" name="branch_id[]" >
                                  <option value="">Choose Branch Name</option>
                                  </select>
                                <span class="mandatory"> {{ $errors->first('branch_id.'.$key)  }} </span>
                              <div class="invalid-feedback">
                                  Enter valid Branch Name 
                                </div>
                              </div>
                            </div>
                         </td>
  
                         
                        <td>
                          <div class="form-group row">
                            <div class="col-sm-12">
                            <input type="text" class="form-control ifsc  required_for_proof_valid" error-data="Enter valid Ifsc Code" readonly placeholder="IFSC Code" name="ifsc[]" value="{{ old('ifsc.'.$key) }}" >
                              <span class="mandatory"> {{ $errors->first('ifsc.'.$key)  }} </span>
                              <div class="invalid-feedback">
                                Enter valid IFSC Code
                              </div>
                            </div>
                          </div>
                        </td>
  
                        <td>
                          <div class="form-group row">
                              <div class="col-sm-12">
                                <select class="js-example-basic-multiple col-12 form-control custom-select account_type_id required_for_valid" error-data="Enter valid Account Type" name="account_type_id[]" >
                                  <option value="">Choose Account Type</option>
                                  @foreach($account_type as $value)
                                  <option value="{{ $value->id }}" {{ old('account_type_id.'.$key) == $value->id ? 'selected' : '' }}  >{{ $value->name }}</option>
                                  @endforeach
                                </select>
                                <span class="mandatory"> {{ $errors->first('account_type_id.'.$key)  }} </span>
                              <div class="invalid-feedback">
                                  Enter valid Account Type 
                                </div>
                              </div>
                            </div>
                         </td>
  
                        <td>
                          <div class="form-group row">
                            <div class="col-sm-12">
                            <input type="text" class="form-control account_holder_name required_for_proof_valid" error-data="Enter valid Account Holder Name" placeholder="Account Holder Name" name="account_holder_name[]" value="{{ old('account_holder_name.'.$key) }}" >
                              <span class="mandatory"> {{ $errors->first('account_holder_name.'.$key)  }} </span>
                              <div class="invalid-feedback">
                                Enter valid Account Holder Name
                              </div>
                            </div>
                          </div>
                        </td>
  
                        <td>
                          <div class="form-group row">
                            <div class="col-sm-12">
                            <input type="text" class="form-control account_no required_for_proof_valid" error-data="Enter valid Account No"  placeholder="Account No" name="account_no[]" value="{{ old('account_no.'.$key) }}" >
                              <span class="mandatory"> {{ $errors->first('account_no.'.$key)  }} </span>
                              <div class="invalid-feedback">
                                Enter valid Account No
                              </div>
                            </div>
                          </div>
                        </td>
                      <td>
                                  <div class="form-group row">
                                      <div class="col-sm-3">
                                      <label class="btn btn-success add_bank_details">+</label>
                                      </div>
                                      <div class="col-sm-3 mx-2">
                                        <label class="btn btn-danger remove_bank_details">-</label>
                                        </div>
                                    </div>
                              </td>
  
                      </tr>

                    @endif
                    @endforeach
                    @endif




                   
                  </tbody>

                </table>

              </div>


                       </div>


                       <div class="state_id_div" style="display:none">
                          @foreach ($state as $value)
                          <option value="{{ $value->id }}" >{{ $value->name }}</option>\
                          @endforeach
                        </div>
                        
                        <div class="address_type_id_div" style="display:none">
                            @foreach ($address_type as $value)
                            <option value="{{ $value->id }}" >{{ $value->name }}</option>\
                            @endforeach
                          </div>
                        
                          <div class="bank_id_div" style="display:none">
                              @foreach ($bank as $value)
                              <option value="{{ $value->id }}" >{{ $value->name }}</option>\
                              @endforeach
                            </div>
                        
                            <div class="account_type_id_div" style="display:none">
                                @foreach ($account_type as $value)
                                <option value="{{ $value->id }}" >{{ $value->name }}</option>\
                                @endforeach
                              </div>



<div class="col-md-7 text-right">
          <button class="btn btn-success submit" type="button">Submit</button>
        </div>
      </form>
    </div>
    <!-- card body end@ -->
  </div>
</div>
<script src="{{asset('assets/js/master/add_more_branch_details.js')}}"></script>
<script>

/* Proof Perment Details Start Here */
/* Address Perement Delete Start Here */
$(document).on("click",".perment_proof_details",function(){
  var proof_details_id=$(this).attr("attr-id");
  var $tr=$(this).closest("tr");
  if($(".perment_proof_details").length >1){
  if(confirm('Are You Sure Want to Delete this ?')){
   $.ajax({
                      type: "post",
                      url: "{{ url('master/customer/delete-agent-proof-details')}}",
                      data: {proof_details_id: proof_details_id},
                      success: function (res)
                      {
                       if(res == 1){
                         $tr.remove();
                         set_sno_for_proof_details();
                          alert("Deleted Successfully ");

                       }else{
alert("Something Went Worng");
                       }
                      }
                  });

  }
}else{
  alert("Atleast One Address Details Present ");
}
  

 });
/* Proof Perment Details End Here */


  

$(document).on("blur change",".required_for_valid",function(){
       $(this).removeClass("is-invalid");
        $(this).removeClass("is-valid");
           if($(this).val() !=""){
            $(this).removeClass("is-invalid");
            $(this).addClass("is-valid");
            if($(this).attr('input-type') == "phone_no"){
               var phone_no=$(this).val();
                if(phone_no_validation(phone_no) == 0){
                 $(this).removeClass("is-valid");
                 $(this).addClass("is-invalid");
                }
                 }

                 if($(this).attr('input-type') == "email"){
               var email=$(this).val();
               
               if(!email_validation(email)){
               
                $(this).removeClass("is-valid");
                 $(this).addClass("is-invalid");
               }
               
                 }
}else{
             $(this).removeClass("is-valid");
            $(this).addClass("is-invalid");
        }
 });

function email_validation(email){
  var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
   return emailPattern.test(email); 
}
function phone_no_validation(phone_no){
  if(phone_no.length != 10){
                return 0
                }else{
                  return 1;
                }
}

function validation(){
  
       var error_count=0;
       $(".required_for_valid").each(function(){
        $(this).removeClass("is-invalid");
           if($(this).val() !=""){
            $(this).removeClass("is-invalid");
            $(this).addClass("is-valid");
            if($(this).attr('input-type') == "phone_no"){
               var phone_no=$(this).val();
                if(phone_no_validation(phone_no) == 0){
                  error_count++;
                $(this).removeClass("is-valid");
                 $(this).addClass("is-invalid");
                }
                 }

                 if($(this).attr('input-type') == "email"){
               var email=$(this).val();
               if(!email_validation(email)){
                error_count++;
                $(this).removeClass("is-valid");
                 $(this).addClass("is-invalid");
               }
               
                 }


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
    var address_error_count=address_details_validation();
    var common_error_count=parseInt(error_count)+parseInt(address_error_count);
    if(common_error_count == 0){
      if($(".required_for_address_valid").length >0){
      
    }else{
      common_error_count++;
      alert("Please Add Atleast One Address ");
     
    }
    if(common_error_count == 0){

      $("form").submit();
    }

    }

   });
  
function state_based_district_for_edit(){
    $(".old_state_id").each(function(key,index){
    console.log("old_state_id"+ key + "== " + $(this).val());
      if($(this).val() !=""){
      var $tr=$(this).closest(".address_div");
        $tr.find(".old_city_id").html("<option value=''>Choose City</option>");
       var state_id=$tr.find(".exist_old_state_id").val();
      var district_id=$tr.find(".exist_old_district_id").val();
     $.ajax({
                  type: "post",
                  url: "{{ url('common/get-state-based-district')}}",
                  data: {state_id: state_id,district_id:district_id},
                  success: function (res)
                  {
                     result = JSON.parse(res);
                   $tr.find(".old_district_id").html(result.option);
                   }
              });
            }
    });


    $(".new_state_id").each(function(key,index){
      if($(this).val() !=""){
        var $tr=$(this).closest(".address_div");
        $tr.find(".city_id").html("<option value=''>Choose City</option>");
        var state_id=$tr.find(".new_state_id").val();
        var district_id=$tr.find(".new_district_id").val();
        $.ajax({
                  type: "post",
                  url: "{{ url('common/get-state-based-district')}}",
                  data: {state_id: state_id,district_id:district_id},
                  success: function (res)
                  {
                     result = JSON.parse(res);
                   $tr.find(".district_id").html(result.option);
                   $("select").select2();
                   }
              });
            }
    });
  
    
    }

    function district_based_city_for_edit(){
       $(".old_district_id").each(function(key,index){
          var $tr=$(this).closest(".address_div");
          var district_id=$tr.find(".exist_old_district_id").val();
           var city_id=$tr.find(".exist_old_city_id").val();
          if(district_id !="" ){
           $.ajax({
                      type: "post",
                      url: "{{ url('common/get-district-based-city')}}",
                      data: {district_id: district_id,city_id:city_id},
                      success: function (res)
                      {
                        result = JSON.parse(res);
                        $tr.find(".old_city_id").html(result.option);
                      }
                  });
                }
         });

         $(".new_district_id").each(function(key,index){
          var $tr=$(this).closest(".address_div");
          var district_id=$tr.find(".new_district_id").val();
           var city_id=$tr.find(".new_city_id").val();
          if(district_id !="" ){
           $.ajax({
                      type: "post",
                      url: "{{ url('common/get-district-based-city')}}",
                      data: {district_id: district_id,city_id:city_id},
                      success: function (res)
                      {
                        result = JSON.parse(res);
                        $tr.find(".city_id").html(result.option);
                      }
                  });
                }
         });
        
        }
$(document).ready(function(){
  $(".address_label").each(function(key,index){
$(this).html("Address Details - " + (key+1));
//$(this).closest(".address_div").find(".remove_address").html("Delete Address Details - " + (key+1));
});
  state_based_district_for_edit();
  district_based_city_for_edit();
  bank_based_branch_edit();
 });

 $(document).on("change",".district_id",function(){
        var $tr=$(this).closest(".address_div");
       
          var district_id=$(this).val();
         if(district_id !="" ){
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
                }

 });


 $(document).on("change",".state_id",function(){
        var $tr=$(this).closest(".address_div");
        $tr.find(".city_id").html("<option value=''>Choose City</option>");
        var state_id=$(this).val();
          if(state_id !="" ){
           $.ajax({
                      type: "post",
                      url: "{{ url('common/get-state-based-district')}}",
                      data: {state_id: state_id},
                      success: function (res)
                      {
                        result = JSON.parse(res);
                        $tr.find(".district_id").html(result.option);
                      }
                  });
                }

 });

/* Exist State District City based Values End Here */

$(document).on("click",".add_address",function(){
    add_address();
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
        <div class="col-md-7">\
          <div class="form-group row">\
          <div class="col-md-7">\
          <h3 class="address_label"></h3>\
          </div>\
          <div class="col-md-4">\
          <h3 class="address_delete_label"><label class="btn btn-danger remove_new_address"> Delete </label></h3>\
              </div>\
          </div>\
          </div>\
           <div class="col-md-6">\
            <div class="form-group row">\
              <label for="validationCustom01" class="col-sm-4 col-form-label">Address Type <span class="mandatory">*</span></label>\
              <div class="col-sm-8">\
                <select class="js-example-basic-multiple col-12 form-control custom-select address_type_id required_for_valid required_for_address_valid" error-data="Enter valid Address Type" name="address_type_id[]">\
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
                <select class="js-example-basic-multiple col-12 form-control custom-select state_id required_for_valid required_for_address_valid" error-data="Enter valid State" name="state_id[]" >\
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
                <select class="js-example-basic-multiple col-12 form-control custom-select district_id" name="district_id[]">\
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
                <select class="js-example-basic-multiple col-12 form-control custom-select city_id" name="city_id[]" >\
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
    $(".address_label").each(function(key,index){
$(this).html("Address Details - " + (key+1));
});
          $("select").select2();
    }
 }

 /* Address Perement Delete Start Here */
 $(document).on("click",".remove_address",function(){
   var $tr=$(this).closest(".address_div");
if($(".remove_address").length >1){
  var address_details_id=$(this).attr("attr-id");
  if(confirm('Are You Sure Want to Delete this ?')){

    $.ajax({
                      type: "post",
                      url: "{{ url('master/customer/delete-customer-address-details')}}",
                      data: {address_details_id: address_details_id},
                      success: function (res)
                      {
                       if(res == 1){
                         $tr.remove();
                          alert("Deleted Successfully ");

                       }else{
alert("Something Went Worng");
                       }
                      }
                  });






//$(this).closest(".address_div").remove();
$(".address_label").each(function(key,index){
//$(this).html("Address Details - " + (key+1));
});
  }
}else{
  alert("Atleast One Address Details Present ");
}
  

 });


 /* Address Perement Delete End Here */

 /* Address Tempory Delete Start Here */
 

 $(document).on("click",".remove_new_address",function(){
   var $tr=$(this).closest(".address_div");
   $(this).closest(".address_div").remove();

  });
 /* Address Tempory Delete End Here */





  /* Bank based Branch  Details Ajax Start Here */
  $(document).on("change",".bank_id",function(){
   var $tr=$(this).closest("tr");
   var bank_id=$(this).val();
   $tr.find(".ifsc").val("");
    $.ajax({
              type: "post",
              url: "{{ url('common/get-bank-based-branch')}}",
              data: {bank_id: bank_id},
              success: function (res)
              {
                result = JSON.parse(res);
               $tr.find(".branch_id").html(result.option);
                
              }
          });
});
/* Bank based Branch  Details Ajax End Here */

/* Branch based IFSC  Details Ajax Start Here */
$(document).on("change",".branch_id",function(){
   var $tr=$(this).closest("tr");
   var branch_id=$(this).val();
   $.ajax({
              type: "post",
              url: "{{ url('common/get-branch-based-ifsc')}}",
              data: {branch_id: branch_id},
              success: function (res)
              {
                result = JSON.parse(res);
               $tr.find(".ifsc").val(result.value);
                
              }
          });
});
/* Branch based IFSC  Details Ajax End Here */


function bank_based_branch_edit(){
       $(".old_bank_id").each(function(key,index){
          var $tr=$(this).closest("tr");

          var bank_id=$tr.find(".exist_old_bank_id").val();
           var branch_id=$tr.find(".exist_old_branch_id").val();
          if(bank_id !="" ){
            $.ajax({
              type: "post",
              url: "{{ url('common/get-bank-based-branch')}}",
              data: {bank_id: bank_id,branch_id:branch_id},
              success: function (res)
              {
                result = JSON.parse(res);
               $tr.find(".branch_id").html(result.option);
                
              }
          });
                }
         });

         $(".new_bank_id").each(function(key,index){
          var $tr=$(this).closest("tr");

          var bank_id=$tr.find(".new_old_bank_id").val();
           var branch_id=$tr.find(".new_old_branch_id").val();
          if(bank_id !="" ){
            $.ajax({
              type: "post",
              url: "{{ url('common/get-bank-based-branch')}}",
              data: {bank_id: bank_id},
              success: function (res)
              {
                result = JSON.parse(res);
               $tr.find(".branch_id").html(result.option);
                
              }
          });
                }
         });

        
        
        }


        /* Remove Bank Details Start Here */
        $(document).on("click",".perment_delete_bank",function(){
   var $tr=$(this).closest("tr");
if($(".perment_delete_bank").length >1){
  var bank_details_id=$(this).attr("attr-id");
  if(confirm('Are You Sure Want to Delete this ?')){

    $.ajax({
                      type: "post",
                      url: "{{ url('master/customer/delete-customer-bank-details')}}",
                      data: {bank_details_id: bank_details_id},
                      success: function (res)
                      {
                       if(res == 1){
                         $tr.remove();
                          alert("Deleted Successfully ");

                       }else{
alert("Something Went Worng");
                       }
                      }
                  });






//$(this).closest(".address_div").remove();
$(".address_label").each(function(key,index){
//$(this).html("Address Details - " + (key+1));
});
  }
}else{
  alert("Atleast One Address Details Present ");
}
  

 });
        /* Remove Bank Details End Here */











</script>

@endsection