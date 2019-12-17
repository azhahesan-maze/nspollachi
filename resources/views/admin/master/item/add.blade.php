@extends('admin.layout.app')
@section('content')
<div class="col-12 body-sec">
  <div class="card container px-0">
    <!-- card header start@ -->
    <div class="card-header px-2">
      <div class="row">
        <div class="col-4">
          <h3>Add Item</h3>
        </div>
        <div class="col-8 mr-auto">
          <ul class="h-right-btn mb-0 pl-0">
            <li><button type="button" class="btn btn-success"><a href="{{url('master/item')}}">Back</a></button></li>
          </ul>
        </div>
      </div>
    </div>
    <!-- card header end@ -->
    <div class="card-body">
    
      <form  method="post" class="form-horizontal needs-validation" novalidate action="{{url('master/item/store')}}" enctype="multipart/form-data">
      {{csrf_field()}}

        <div class="form-row">
          <div class="col-md-6">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Item Name <span class="mandatory">*</span></label>
              <div class="col-sm-8">
                <input type="text" class="form-control name only_allow_alp_num_dot_com_amp" placeholder="Item Name" name="name" value="{{old('name')}}" required>
                <span class="mandatory"> {{ $errors->first('name')  }} </span>
                <div class="invalid-feedback">
                  Enter valid Item Name
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-6">
              <div class="form-group row">
                <label for="validationCustom01" class="col-sm-4 col-form-label">Item Code <span class="mandatory">*</span></label>
                <div class="col-sm-8">
                  <input type="text" class="form-control code only_allow_alp_num_dot_com_amp" placeholder="Item Code" name="code" value="{{old('code')}}" required>
                  <span class="mandatory"> {{ $errors->first('code')  }} </span>
                  <div class="invalid-feedback">
                    Enter valid Item Code
                  </div>
                </div>
              </div>
            </div>

            <div class="col-md-6">
                <div class="form-group row">
                  <label for="validationCustom01" class="col-sm-4 col-form-label">{{ $category_1}} <span class="mandatory">*</span></label>
                  <div class="col-sm-8">
                    <select class="js-example-basic-multiple col-12 form-control custom-select category_1" name="category_1" required>
                      <option value="">Choose {{ $category_1}}</option>
                      @foreach ($category_one as $value)
                      <option value="{{ $value->id }}" {{ old('category_1') == $value->id ? 'selected' : '' }}  >{{ $value->name }}</option>
                      @endforeach
                    </select>
                    <span class="mandatory"> {{ $errors->first('category_1')  }} </span>
                   <div class="invalid-feedback">
                      Enter valid {{ $category_1}}
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-md-6">
                  <div class="form-group row">
                    <label for="validationCustom01" class="col-sm-4 col-form-label">{{$category_2}} </label>
                    <div class="col-sm-8">
                      <select class="js-example-basic-multiple col-12 form-control custom-select category_2" name="category_2" >
                        <option value="">Choose {{$category_2}}</option>
                      </select>
                      <span class="mandatory"> {{ $errors->first('category_2')  }} </span>
                     <div class="invalid-feedback">
                        Enter valid {{$category_2}}
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group row">
                      <label for="validationCustom01" class="col-sm-4 col-form-label">{{ $category_3}} </label>
                      <div class="col-sm-8">
                        <select class="js-example-basic-multiple col-12 form-control custom-select category_3" name="category_3" >
                          <option value="">Choose {{ $category_3}}</option>
                        </select>
                        <span class="mandatory"> {{ $errors->first('category_3')  }} </span>
                       <div class="invalid-feedback">
                          Enter valid {{ $category_3}}
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-6">
                      <div class="form-group row">
                        <label for="validationCustom01" class="col-sm-4 col-form-label"> Item Type <span class="mandatory">*</span></label>
                        <div class="col-sm-8">
                          <select class="js-example-basic-multiple col-12 form-control custom-select item_type" name="item_type" required>
                            <option value="">Choose Item Type</option>
                           <option value="Direct" selected  {{ old('item_type') == "Direct" ? 'selected' : '' }}  >Direct</option>
                            <option value="Bulk" {{ old('item_type') == "Bulk" ? 'selected' : '' }}  >Bulk</option>
                            <option value="Repack" {{ old('item_type') == "Repack" ? 'selected' : '' }}  >Repack</option>
                            <!--<option value="Parent" {{ old('item_type') == "Parent" ? 'selected' : '' }}  >Parent</option>
                            <option value="Child" {{ old('item_type') == "Child" ? 'selected' : '' }}  >Child</option>
                            -->   </select>
                          <span class="mandatory"> {{ $errors->first('item_type')  }} </span>
                         <div class="invalid-feedback">
                            Enter valid Item Type
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="col-md-6 bulk_item_div" style="display:none">
                      <div class="form-group row">
                        <label for="validationCustom01" class="col-sm-4 col-form-label"> Bulk Item </label>
                        <div class="col-sm-8">
                          <select class="js-example-basic-multiple col-12 form-control custom-select bulk_item_id" name="bulk_item_id">
                            <option value="">Choose Bulk Item</option>
                            @foreach ($bulk_item as $value)
                            <option value="{{ $value->id }}" {{ old('bulk_item_id') == $value->id ? 'selected' : '' }}  >{{ $value->name }}</option>
                            @endforeach
                           </select>
                          <span class="mandatory"> {{ $errors->first('bulk_item_id')  }} </span>
                         <div class="invalid-feedback">
                            Enter valid Bulk Item Name
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group row">
                        <label for="validationCustom01" class="col-sm-4 col-form-label">Weight In Grams <span class="mandatory">*</span></label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control weight_in_grams only_allow_digit_and_dot" placeholder="Weight In Grams " name="weight_in_grams" value="{{old('weight_in_grams')}}" >
                          <span class="mandatory"> {{ $errors->first('weight_in_grams')  }} </span>
                          <div class="invalid-feedback">
                            Enter valid Weight In Grams
                          </div>
                        </div>
                      </div>
                    </div>



                  <div class="col-md-6">
                      <div class="form-group row">
                        <label for="validationCustom01" class="col-sm-4 col-form-label">Print Name in English <span class="mandatory">*</span></label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control print_name_in_english only_allow_alp_num_dot_com_amp" placeholder="Print Name in English " name="print_name_in_english" value="{{old('print_name_in_english')}}" required>
                          <span class="mandatory"> {{ $errors->first('print_name_in_english')  }} </span>
                          <div class="invalid-feedback">
                            Enter valid Print Name in English 
                          </div>
                        </div>
                      </div>
                    </div>
                   
                    @php
                        $language_1=isset($language[0]->language_1) && !empty($language[0]->language_1) ? $language[0]->language_1 : "Language 1 " ;
                        $language_2=isset($language[0]->language_2) && !empty($language[0]->language_2) ? $language[0]->language_2 : "Language 2 " ;
                        $language_3=isset($language[0]->language_3) && !empty($language[0]->language_3) ? $language[0]->language_3 : "Language 3 " ;
                    @endphp

                    <div class="col-md-6">
                        <div class="form-group row">
                        <label for="validationCustom01" class="col-sm-4 col-form-label">Print Name in {{$language_1}}</label>
                          <div class="col-sm-8">
                            <input type="text" class="form-control print_name_in_language_1 only_allow_alp_num_dot_com_amp" placeholder="Print Name in {{ $language_1 }}" name="print_name_in_language_1" value="{{old('print_name_in_language_1')}}" >
                            <span class="mandatory"> {{ $errors->first('print_name_in_language_1')  }} </span>
                            <div class="invalid-feedback">
                              Enter valid Print Name in {{ $language_1 }}
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="col-md-6">
                          <div class="form-group row">
                            <label for="validationCustom01" class="col-sm-4 col-form-label">Print Name in {{$language_2}} </label>
                            <div class="col-sm-8">
                              <input type="text" class="form-control print_name_in_language_2 only_allow_alp_num_dot_com_amp" placeholder="Print Name in {{ $language_2 }}" name="print_name_in_language_2" value="{{old('print_name_in_language_2')}}" >
                              <span class="mandatory"> {{ $errors->first('print_name_in_language_2')  }} </span>
                              <div class="invalid-feedback">
                                Enter valid Print Name in {{ $language_2 }}
                              </div>
                            </div>
                          </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group row">
                              <label for="validationCustom01" class="col-sm-4 col-form-label">Print Name in {{$language_3}} </label>
                              <div class="col-sm-8">
                                <input type="text" class="form-control print_name_in_language_3 only_allow_alp_num_dot_com_amp" placeholder="Print Name in {{ $language_3 }}" name="print_name_in_language_3" value="{{old('print_name_in_language_3')}}">
                                <span class="mandatory"> {{ $errors->first('print_name_in_language_3')  }} </span>
                                <div class="invalid-feedback">
                                  Enter valid Print Name in {{ $language_3 }}
                                </div>
                              </div>
                            </div>
                          </div>



                          <div class="col-md-6">
                              <div class="form-group row">
                                <label for="validationCustom01" class="col-sm-4 col-form-label">PTC Code <span class="mandatory">*</span></label>
                                <div class="col-sm-8">
                                  <input type="text" class="form-control ptc only_allow_alp_num_dot_com_amp" placeholder="PTC Code" name="ptc" value="{{old('ptc')}}" required>
                                  <span class="mandatory"> {{ $errors->first('ptc')  }} </span>
                                  <div class="invalid-feedback">
                                    Enter valid PTC Code 
                                  </div>
                                </div>
                              </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group row">
                                  <label for="validationCustom01" class="col-sm-4 col-form-label">EAN Code <span class="mandatory">*</span></label>
                                  <div class="col-sm-8">
                                    <input type="text" class="form-control ean only_allow_alp_num_dot_com_amp" placeholder="EAN Code" name="ean" value="{{old('ean')}}" required>
                                    <span class="mandatory"> {{ $errors->first('ean')  }} </span>
                                    <div class="invalid-feedback">
                                      Enter valid EAN Code 
                                    </div>
                                  </div>
                                </div>
                              </div>

                              <div class="col-md-6">
                                  <div class="form-group row">
                                    <label for="validationCustom01" class="col-sm-4 col-form-label">MRP <span class="mandatory">*</span></label>
                                    <div class="col-sm-8">
                                      <input type="text" class="form-control only_allow_digit_and_dot mrp only_allow_alp_num_dot_com_amp" placeholder="MRP" name="mrp" value="{{old('mrp')}}" required>
                                      <span class="mandatory"> {{ $errors->first('mrp')  }} </span>
                                      <div class="invalid-feedback">
                                        Enter valid MRP 
                                      </div>
                                    </div>
                                  </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group row">
                                      <label for="validationCustom01" class="col-sm-4 col-form-label">Default Selling Price <span class="mandatory">*</span></label>
                                      <div class="col-sm-8">
                                        <input type="text" class="form-control only_allow_digit_and_dot default_selling_price only_allow_alp_num_dot_com_amp" placeholder="Default Selling Price" name="default_selling_price" value="{{old('default_selling_price')}}" required>
                                        <span class="mandatory"> {{ $errors->first('default_selling_price')  }} </span>
                                        <div class="invalid-feedback">
                                          Enter valid Default Selling Price 
                                        </div>
                                      </div>
                                    </div>
                                  </div>

                                  <div class="col-md-6">
                                      <div class="form-group row">
                                        <label for="validationCustom01" class="col-sm-4 col-form-label">UOM <span class="mandatory">*</span></label>
                                        <div class="col-sm-8">
                                          <select class="js-example-basic-multiple col-12 form-control custom-select uom_id" name="uom_id" required>
                                            <option value="">Choose UOM</option>
                                            @foreach ($uom as $value)
                                            <option value="{{ $value->id }}" {{ old('uom_id') == $value->id ? 'selected' : '' }}  >{{ $value->name }}</option>
                                            @endforeach
                                          </select>
                                          <span class="mandatory"> {{ $errors->first('uom_id')}} </span>
                                         <div class="invalid-feedback">
                                            Enter valid UOM
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                          <label for="validationCustom01" class="col-sm-4 col-form-label">Is Machine Weight Applicable <span class="mandatory">*</span></label>
                                          <div class="col-sm-8">
                                              <div class="form-check">
                                                  <label class="form-check-label">
                                                    <input type="radio" class="form-check-input is_machine_weight_applicable" value ="1" {{ old('is_machine_weight_applicable') == 1 ? 'checked' : '' }} name="is_machine_weight_applicable">Yes
                                                  </label>
                                                </div>

                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                      <input type="radio" class="form-check-input is_machine_weight_applicable" value ="0" {{ old('is_machine_weight_applicable') == 0 ? 'checked' : '' }} name="is_machine_weight_applicable">No
                                                    </label>
                                                  </div>
                                            
                                            <span class="mandatory"> {{ $errors->first('machine_weight_applicable')}} </span>
                                           <div class="invalid-feedback">
                                              Enter valid Machine Weight
                                            </div>
                                          </div>
                                        </div>
                                      </div>

                                    <div class="col-md-6">
                                        <div class="form-group row">
                                          <label for="validationCustom01" class="col-sm-4 col-form-label">Is Expiry Date Applicable <span class="mandatory">*</span></label>
                                          <div class="col-sm-8">
                                              <div class="form-check">
                                                  <label class="form-check-label">
                                                    <input type="radio" class="form-check-input is_expiry_date" value ="1" {{ old('is_expiry_date') == 1 ? 'checked' : '' }} name="is_expiry_date">Yes
                                                  </label>
                                                </div>

                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                      <input type="radio" class="form-check-input is_expiry_date" value ="0" {{ old('is_expiry_date') == 0 ? 'checked' : '' }} name="is_expiry_date">No
                                                    </label>
                                                  </div>
                                            
                                            <span class="mandatory"> {{ $errors->first('uom_id')}} </span>
                                           <div class="invalid-feedback">
                                              Enter valid UOM
                                            </div>
                                          </div>
                                        </div>
                                      </div>

                                      <div class="col-md-6 expiry_date_div" style="display: none">
                                          <div class="form-group row">
                                            <label for="validationCustom01" class="col-sm-4 col-form-label">Expiry Date <span class="mandatory">*</span></label>
                                            <div class="col-sm-8">
                                              <input type="text" class="form-control expiry_date" placeholder="Expiry Date" name="expiry_date" value="{{old('expiry_date')}}">
                                              <span class="mandatory"> {{ $errors->first('expiry_date')  }} </span>
                                              <div class="invalid-feedback">
                                                Enter valid Expiry Date 
                                              </div>
                                            </div>
                                          </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group row">
                                              <label for="validationCustom01" class="col-sm-4 col-form-label">Product Image </label>
                                              <div class="col-sm-8">
                                                <input type="file" class="form-control image" placeholder="Product Image" name="image" value="{{old('image')}}">
                                                <span class="mandatory"> {{ $errors->first('image')  }} </span>
                                                <div class="invalid-feedback">
                                                  Enter valid Product Image 
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




  $(".name").keyup(function(){
    $(".print_name_in_english").val($(this).val());
  });

/* Repack */

function item_type()
{
  $(".weight_in_grams").removeAttr("required");
  $(".bulk_item_id").removeAttr('required');
  var item_type=$(".item_type").val();
  if(item_type == "Bulk")
  {
    $(".weight_in_grams").attr('required', 'required');
  }
  if(item_type == "Repack")
  {
    $(".weight_in_grams").attr('required', 'required');
    $(".bulk_item_id").attr('required', 'required');
    $(".bulk_item_div").css("display","block");
    get_category_based_item($(".category_1").val(),$(".category_2").val(),$(".category_3").val(),item_id="")
  }else
  {
    $(".bulk_item_div").css("display","none");
  }

}


$(document).on("change",".item_type",function(){
  item_type();

});

function get_category_based_item(category_one_id,category_two_id,category_three_id,item_id)
{
  $.ajax({
              type: "post",
              url: "{{ url('common/get-category-based-bulk-item')}}",
              data: {category_one_id:category_one_id,category_two_id: category_two_id, category_three_id:category_three_id,item_id:item_id},
              success: function (res)
              {
                result = JSON.parse(res);
                $(".bulk_item_id").html(result.option);
              }
          });

}


  

 function get_category_one_based_category_two(category_one_id,category_two_id)
{
  $.ajax({
              type: "post",
              url: "{{ url('common/get-category-one-based-category-two')}}",
              data: {category_one_id: category_one_id, category_two_id:category_two_id},
              success: function (res)
              {
                result = JSON.parse(res);
                $(".category_2").html(result.option);
                $(".category_3").html("<option value=''>Choose Category 3</option>");
              }
          });

}

function get_category_two_based_category_three(category_two_id,category_three_id)
{
  $.ajax({
              type: "post",
              url: "{{ url('common/get-category-two-based-category-three')}}",
              data: {category_two_id: category_two_id, category_three_id:category_three_id},
              success: function (res)
              {
                result = JSON.parse(res);
                $(".category_3").html(result.option);
              }
          });

}

$(document).on("change",".category_1",function(){
  if($(this).val() != ""){
    get_category_one_based_category_two($(this).val(),category_two_id ="");
    get_category_based_item($(this).val(),category_two_id="",category_three_id="",item_id="");
  }
  
});

$(document).on("change",".category_2",function(){
  if($(this).val() != ""){
    get_category_two_based_category_three($(this).val(),category_three_id ="");
    get_category_based_item($(".category_1").val(),$(this).val(),category_three_id="",item_id="");
  }
  
});

$(document).on("change",".category_3",function(){
  if($(this).val() != ""){
     get_category_based_item($(".category_1").val(),$(".category_2").val(),$(this).val(),item_id="");
  }
  
});

$(document).on("click",".is_expiry_date",function()
{
  var is_expiry_date=$(".is_expiry_date:checked").val();
  console.log("is_expiry_date == " + is_expiry_date);
  if(is_expiry_date == 1){
    $(".expiry_date_div").css("display","block");
  }else{
    $(".expiry_date_div").css("display","none");
  }
});

$(document).ready(function()
{
 var old_expiry_date="{{ old('is_expiry_date')}}";
  var is_expiry_date="";
  is_expiry_date=$(".is_expiry_date :checked").val();
  if(old_expiry_date != ""){
    is_expiry_date=old_expiry_date;
  }
  
  if(is_expiry_date == 1){
    $(".expiry_date_div").css("display","block");
  }else{
    $(".expiry_date_div").css("display","none");
  }

  var category_one_id=$(".category_1").val();
  var category_two_id="{{ old('category_2')}}";
  var category_three_id="{{ old('category_3')}}";
  var bulk_item_id="{{ old('bulk_item_id')}}";

  item_type();

  if(category_one_id !="")
  {
    get_category_one_based_category_two(category_one_id,category_two_id);
    get_category_based_item(category_one_id,category_two_id,category_three_id,bulk_item_id);
  }

  if(category_two_id !="")
  {
    get_category_two_based_category_three(category_two_id,category_three_id); 
  }

});
</script>




@endsection

