@extends('admin.layout.app')
@section('content')
<div class="col-12 body-sec">
  <div class="card container px-0">
    <!-- card header start@ -->
    <div class="card-header px-2">
      <div class="row">
        <div class="col-4">
          <h3>Edit Item</h3>
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
      <form  method="post" class="form-horizontal needs-validation" novalidate action="{{url('master/item/update/'.$item->id)}}" enctype="multipart/form-data">
      {{csrf_field()}}

      <div class="form-row">
        <div class="col-md-6">
          <div class="form-group row">
            <label for="validationCustom01" class="col-sm-4 col-form-label">Item Name <span class="mandatory">*</span></label>
            <div class="col-sm-8">
              <input type="text" class="form-control name only_allow_alp_num_dot_com_amp" placeholder="Item Name" name="name" value="{{old('name',$item->name)}}" required>
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
                <input type="text" class="form-control code only_allow_alp_num_dot_com_amp" placeholder="Item Code" name="code" value="{{old('code',$item->code)}}" required>
                <span class="mandatory"> {{ $errors->first('code')  }} </span>
                <div class="invalid-feedback">
                  Enter valid Item Code
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label"> Brand <span class="mandatory">*</span></label>
              <div class="col-sm-6">
                <select class="js-example-basic-multiple col-12 form-control custom-select brand_id" name="brand_id" required>
                  <option value="">Choose Brand</option>
                  <option value="0" {{ old('brand_id',$item->brand_id) == "0" ? 'selected' : '' }}> Not Applicable </option>
                  @foreach ($brand as $value)
                  <option value="{{ $value->id }}" {{ old('brand_id',$item->brand_id) == $value->id ? 'selected' : '' }}  >{{ $value->name }}</option>
                  @endforeach
                </select>
                <span class="mandatory"> {{ $errors->first('brand_id')  }} </span>
               <div class="invalid-feedback">
                  Enter valid Brand
                </div>
              </div>
              <a href="{{ url('master/brand/create')}}" target="_blank">
                <button type="button"  class="px-2 btn btn-success ml-2" title="Add Brand"><i class="fa fa-plus-circle" aria-hidden="true"></i></button></a>
                <button type="button"  class="px-2 btn btn-success mx-2 refresh_brand_id" title="Add Brand"><i class="fa fa-refresh" aria-hidden="true"></i></button>
          
            </div>
          </div>

                <div class="col-md-6">
                  <div class="form-group row">
                    <label for="validationCustom01" class="col-sm-4 col-form-label"> Category <span class="mandatory">*</span></label>
                    <div class="col-sm-6">
                      <select class="js-example-basic-multiple col-12 form-control custom-select category_id" name="category_id" required>
                        <option value="">Choose Category</option>
                        @foreach ($category as $value)
                        <option value="{{ $value->id }}" {{ old('category_id',$item->category_id) == $value->id ? 'selected' : '' }}  >{{ $value->name }}</option>
                        @endforeach
                      </select>
                      <span class="mandatory"> {{ $errors->first('category_id')  }} </span>
                     <div class="invalid-feedback">
                        Enter valid Category
                      </div>
                    </div>
                    <a href="{{ url('master/category/create')}}" target="_blank">
                      <button type="button"  class="px-2 btn btn-success ml-2" title="Add Category"><i class="fa fa-plus-circle" aria-hidden="true"></i></button></a>
                      <button type="button"  class="px-2 btn btn-success mx-2 refresh_category_id" title="Refresh Category"><i class="fa fa-refresh" aria-hidden="true"></i></button>
                
                  </div>
                </div>

                

                <div class="col-md-6">
                    <div class="form-group row">
                      <label for="validationCustom01" class="col-sm-4 col-form-label"> Item Type <span class="mandatory">*</span></label>
                      <div class="col-sm-8">
                        <select class="js-example-basic-multiple col-12 form-control custom-select item_type" name="item_type" required>
                          <option value="">Choose Item Type</option>
                         <option value="Direct"   {{ old('item_type',$item->item_type) == "Direct" ? 'selected' : '' }}  >Direct</option>
                          <option value="Bulk" {{ old('item_type',$item->item_type) == "Bulk" ? 'selected' : '' }}  >Bulk</option>
                          <option value="Repack" {{ old('item_type',$item->item_type) == "Repack" ? 'selected' : '' }}  >Repack</option>
                          <option value="Parent" {{ old('item_type',$item->item_type) == "Parent" ? 'selected' : '' }}  >Parent</option>
                          <option value="Child" {{ old('item_type',$item->item_type) == "Child" ? 'selected' : '' }}  >Child</option>
                        </select>
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
                      <div class="col-sm-6">
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
                      <a href="{{ url('master/item/create')}}" target="_blank">
                        <button type="button"  class="px-2 btn btn-success ml-2" title="Add Bulk Item"><i class="fa fa-plus-circle" aria-hidden="true"></i></button></a>
                        <button type="button"  class="px-2 btn btn-success mx-2 refresh_item_id" title="Refresh Bulk Item"><i class="fa fa-refresh" aria-hidden="true"></i></button>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group row">
                      <label for="validationCustom01" class="col-sm-4 col-form-label">Weight In Grams <span class="mandatory">*</span></label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control weight_in_grams only_allow_digit_and_dot" placeholder="Weight In Grams " name="weight_in_grams" value="{{old('weight_in_grams',$item->weight_in_grams)}}" >
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
                        <input type="text" class="form-control print_name_in_english only_allow_alp_num_dot_com_amp" placeholder="Print Name in English " name="print_name_in_english" value="{{old('print_name_in_english',$item->print_name_in_english)}}" required>
                        <span class="mandatory"> {{ $errors->first('print_name_in_english')  }} </span>
                        <div class="invalid-feedback">
                          Enter valid Print Name in English 
                        </div>
                      </div>
                    </div>
                  </div>
                 
                  

                  <div class="col-md-6">
                      <div class="form-group row">
                      <label for="validationCustom01" class="col-sm-4 col-form-label">Print Name in {{$language_1}}</label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control print_name_in_language_1 only_allow_alp_num_dot_com_amp" placeholder="Print Name in {{ $language_1 }}" name="print_name_in_language_1" value="{{old('print_name_in_language_1',$item->print_name_in_language_1)}}" >
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
                            <input type="text" class="form-control print_name_in_language_2 only_allow_alp_num_dot_com_amp" placeholder="Print Name in {{ $language_2 }}" name="print_name_in_language_2" value="{{old('print_name_in_language_2',$item->print_name_in_language_2)}}">
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
                              <input type="text" class="form-control print_name_in_language_3 only_allow_alp_num_dot_com_amp" placeholder="Print Name in {{ $language_3 }}" name="print_name_in_language_3" value="{{old('print_name_in_language_3',$item->print_name_in_language_3)}}">
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
                                <input type="text" class="form-control ptc only_allow_alp_num_dot_com_amp" placeholder="PTC Code" name="ptc" value="{{old('ptc',$item->ptc)}}" required>
                                <span class="mandatory"> {{ $errors->first('ptc')  }} </span>
                                <div class="invalid-feedback">
                                  Enter valid PTC Code 
                                </div>
                              </div>
                            </div>
                          </div>

                          <div class="col-md-6">
                              <div class="form-group row">
                                <label for="validationCustom01" class="col-sm-4 col-form-label">Barcode <span class="mandatory">*</span></label>
                                <div class="col-sm-8">
                                  <input type="text" class="form-control barcode only_allow_alp_num_dot_com_amp" placeholder="Barcode" name="barcode" value="{{old('barcode',$item->barcode)}}" required>
                                  <span class="mandatory"> {{ $errors->first('barcode')  }} </span>
                                  <div class="invalid-feedback">
                                    Enter valid Barcode
                                  </div>
                                </div>
                              </div>
                            </div>

                            <div class="col-md-6">
                              <div class="form-group row">
                                <label for="validationCustom01" class="col-sm-4 col-form-label">Hsn Code <span class="mandatory">*</span></label>
                                <div class="col-sm-8">
                                  <input type="text" class="form-control hsn only_allow_alp_num_dot_com_amp" placeholder="Hsn Code" name="hsn" value="{{old('hsn',$item->hsn)}}" required>
                                  <span class="mandatory"> {{ $errors->first('hsn')  }} </span>
                                  <div class="invalid-feedback">
                                    Enter valid Hsn Code
                                  </div>
                                </div>
                              </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group row">
                                  <label for="validationCustom01" class="col-sm-4 col-form-label">MRP <span class="mandatory">*</span></label>
                                  <div class="col-sm-8">
                                    <input type="text" class="form-control only_allow_digit_and_dot mrp only_allow_alp_num_dot_com_amp" placeholder="MRP" name="mrp" value="{{old('mrp',$item->mrp)}}" required>
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
                                      <input type="text" class="form-control only_allow_digit_and_dot default_selling_price only_allow_alp_num_dot_com_amp" placeholder="Default Selling Price" name="default_selling_price" value="{{old('default_selling_price',$item->default_selling_price)}}" required>
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
                                      <div class="col-sm-6">
                                        <select class="js-example-basic-multiple col-12 form-control custom-select uom_id" name="uom_id" required>
                                          <option value="">Choose UOM</option>
                                          @foreach ($uom as $value)
                                          <option value="{{ $value->id }}" {{ old('uom_id',$item->uom_id) == $value->id ? 'selected' : '' }}  >{{ $value->name }}</option>
                                          @endforeach
                                        </select>
                                        <span class="mandatory"> {{ $errors->first('uom_id')}} </span>
                                       <div class="invalid-feedback">
                                          Enter valid UOM
                                        </div>
                                      </div>
                                      <a href="{{ url('master/category/create')}}" target="_blank">
                                        <button type="button"  class="px-2 btn btn-success ml-2" title="Add Uom"><i class="fa fa-plus-circle" aria-hidden="true"></i></button></a>
                                        <button type="button"  class="px-2 btn btn-success mx-2 refresh_uom_id" title="Add Uom"><i class="fa fa-refresh" aria-hidden="true"></i></button>
                                    </div>
                                  </div>

                                  <div class="col-md-6">
                                      <div class="form-group row">
                                        <label for="validationCustom01" class="col-sm-4 col-form-label">Is Machine Weight Applicable <span class="mandatory">*</span></label>
                                        <div class="col-sm-8">
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                  <input type="radio" class="form-check-input is_machine_weight_applicable" {{ old('is_machine_weight_applicable',$item->is_machine_weight_applicable) == 1 ? 'checked' : '' }} value ="1" name="is_machine_weight_applicable">Yes
                                                </label>
                                              </div>

                                              <div class="form-check">
                                                  <label class="form-check-label">
                                                    <input type="radio" class="form-check-input is_machine_weight_applicable" value ="0" {{ old('is_machine_weight_applicable',$item->is_machine_weight_applicable) == 0 ? 'checked' : '' }} name="is_machine_weight_applicable">No
                                                  </label>
                                                </div>
                                          
                                          <span class="mandatory"> {{ $errors->first('is_machine_weight_applicable')}} </span>
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
                                                  <input type="radio" class="form-check-input is_expiry_date" value ="1" {{ old('is_expiry_date',$item->is_expiry_date) == 1 ? 'checked' : '' }}  name="is_expiry_date">Yes
                                                </label>
                                              </div>

                                              <div class="form-check">
                                                  <label class="form-check-label">
                                                    <input type="radio" class="form-check-input is_expiry_date" value ="0" {{ old('is_expiry_date',$item->is_expiry_date) == 0 ? 'checked' : '' }}  name="is_expiry_date">No
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

                                      @php
                                      $expiry_date="";
                                          if(old('expiry_date') !=""){
                                            $expiry_date=date('d-m-Y',strtotime(old('expiry_date')));
                                          }else if($item->expiry_date !=""){
                                            $expiry_date=date('d-m-Y',strtotime($item->expiry_date));
                                          }
                                      @endphp
                                        <div class="form-group row">
                                          <label for="validationCustom01" class="col-sm-4 col-form-label">Expiry Date <span class="mandatory">*</span></label>
                                          <div class="col-sm-8">
                                            <input type="text" class="form-control expiry_date" placeholder="Expiry Date" name="expiry_date" value="{{old('expiry_date',$expiry_date)}}">
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
          <button class="btn btn-success" type="submit">Submit</button>
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
                 //$(".category_3").html("<option value=''>Choose Category 3</option>");
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
   }
   
 });
 
 $(document).on("change",".category_2",function(){
   if($(this).val() != ""){
     get_category_two_based_category_three($(this).val(),category_three_id ="");
   }
   
 });

 $(document).on("change",".category_3",function(){
  if($(this).val() != ""){
     get_category_based_item($(".category_1").val(),$(".category_2").val(),$(this).val(),item_id="");
  }
  
});

$(document).on("click",".refresh_category_id",function(){
   var category_dets=refresh_category_master_details();
   $(".category_id").html(category_dets);
});
$(document).on("click",".refresh_uom_id",function(){
   var uom_dets=refresh_uom_master_details();
   $(".uom_id").html(uom_dets);
});

$(document).on("click",".refresh_item_id",function(){
   var item_dets=refresh_item_master_details();
   $(".bulk_item_id").html(item_dets);
});

$(document).on("click",".refresh_brand_id",function(){
   var brand_dets=refresh_brand_master_details();
   $(".brand_id").html(brand_dets);
});

 
 $(document).on("click",".is_expiry_date",function(){
   var is_expiry_date=$(".is_expiry_date:checked").val();
   console.log("is_expiry_date == " + is_expiry_date);
   if(is_expiry_date == 1){
     $(".expiry_date_div").css("display","block");
   }else{
     $(".expiry_date_div").css("display","none");
   }
 });
 
 $(document).ready(function(){
  item_type();
   var old_expiry_date="{{ old('is_expiry_date')}}";
   var is_expiry_date="";
   is_expiry_date="{{ $item->is_expiry_date }}";
   if(old_expiry_date != ""){
     is_expiry_date=old_expiry_date;
   }
   
   if(is_expiry_date == 1){
     $(".expiry_date_div").css("display","block");
   }else{
     $(".expiry_date_div").css("display","none");
   }
   

   /* Category Based Subcategory Ajax Start Here */
   var category_1="";
   var category_2="";
   var category_3="";
  

   var new_category_1=$(".category_1").val();
   var new_category_2="{{ $item->category_2}}";
   var new_category_3="{{ $item->category_3}}";
   var new_bulk_item_id="{{ $item->bulk_item_id}}";
   var old_category_1="{{ old('category_1') }}";
   var old_category_2="{{ old('category_2') }}";
   var old_category_3="{{ old('category_3') }}";
   var old_bulk_item_id="{{ old('bulk_item_id') }}";


   category_1=old_category_1 !="" ? old_category_1 : new_category_1;
   category_2=old_category_2 !="" ? old_category_2 : new_category_2;
   category_3=old_category_3 !="" ? old_category_3 : new_category_3;
   bulk_item_id=old_bulk_item_id !="" ? old_bulk_item_id : new_bulk_item_id;
if(category_1 !=""){
  get_category_one_based_category_two(category_1,category_2);
 

}

if(category_2 !=""){
  get_category_two_based_category_three(category_2,category_3);
}
get_category_based_item(category_1,category_2,category_3,bulk_item_id);
  
  


   /* Category Based Subcategory Ajax End Here */

});






 </script>

@endsection