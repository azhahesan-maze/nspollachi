@extends('admin.layout.app')
@section('content')
<div class="col-12 body-sec">
  <div class="card container-fluid px-0">
    <!-- card header start@ -->
    <div class="card-header px-2">
      <div class="row">
        <div class="col-4">
          <h3>Add Item Tax Details</h3>
        </div>
        <div class="col-8 mr-auto">
          <ul class="h-right-btn mb-0 pl-0">
            <li><button type="button" class="btn btn-success"><a href="{{url('master/item-tax-details')}}">Back</a></button></li>
          </ul>
        </div>
      </div>
    </div>
    <!-- card header end@ -->
    <div class="card-body">
    
      <form  method="post" class="form-horizontal needs-validation form_submit" novalidate action="{{url('master/item-tax-details/store')}}" enctype="multipart/form-data">
      {{csrf_field()}}



        <div class="form-row">
          
          <div class="col-md-4">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Category <span class="mandatory">*</span></label>
              <div class="col-sm-8">
                <select class="js-example-basic-multiple col-12 form-control custom-select category_id search_category_id" name="category_1" required>
                  <option value="">Choose {{ $category_1}}</option>
                  @foreach ($category as $value)
                  <option value="{{ $value->id }}" {{ old('category_id') == $value->id ? 'selected' : '' }}  >{{ $value->name }}</option>
                  @endforeach
                </select>
                <span class="mandatory"> {{ $errors->first('category_id')  }} </span>
               <div class="invalid-feedback">
                  Enter valid Category
                </div>
              </div>
            </div>
          </div>
           <!-- <div class="col-md-6">
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
                  </div> -->

                  <div class="col-md-4">
                      <div class="form-group row">
                        <label for="validationCustom01" class="col-sm-4 col-form-label">Item </label>
                        <div class="col-sm-8">
                          <select class="js-example-basic-multiple col-12 form-control custom-select item_id search_item_id" name="item_id" required>
                            <option value="">Choose Item </option>
                          </select>
                          <span class="mandatory"> {{ $errors->first('item_id')  }} </span>
                         <div class="invalid-feedback">
                            Enter valid Item Name
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="col-md-4">
                      <div class="form-group row">
                       
                        <div class="col-sm-8">
                         
                         <label class="btn btn-success search_btn">Search</label>
                         
                        </div>
                      </div>
                    </div>
                                  
 </div>

 <div class="form-row">


  <table class="table">
    <thead class="thead-dark">
      <tr>
        <th>S.No</th>
        <th>Item</th>
        <th>IGST (%) </th>
        <th>CGST (%) </th>
        <th >SGST (%) </th>
        <th >Effective From </th>
      </tr>
    </thead>
    <tbody class="append_row">
      
      
    </tbody>
  </table>
       
 </div>
        <div class="col-md-7 text-right response_div" style="display:none">
          <button class="btn btn-success" name="add" type="submit">Submit</button>
        </div>
      </form>
    </div>
    <!-- card body end@ -->

  </div>
</div>


<script>

$(document).ready(function () {
  //$(".response_div").css("display","none");
  var currentDate = new Date();
    $('.valid_from').datepicker({
    format: "dd-mm-yyyy",
    todayHighlight: true,
    startDate: currentDate,
    endDate: '',
    setDate: currentDate,
    autoclose: true
    });

/* Set Dropdown Values for onload  */
var category_one_id=$(".category_1").val();
var category_two_id="{{ old('category_2') }}";
var category_three_id="{{ old('category_3') }}";
var item_id="{{ old('item_id') }}";

if(category_one_id != "")
{
   // get_category_one_based_category_two(category_one_id,category_two_id);
}

if(category_two_id != "")
{
 // get_category_two_based_category_three(category_two_id,category_three_id);
}


if(category_one_id !="" || category_two_id !="" || category_three_id != "")
{
 // get_category_based_item(category_one_id,category_two_id,category_three_id,item_id);
}
  });


$(document).on("change",".category_id",function(){
  var category_id=$(this).val();
  if(category_id !="")
  {
    category_based_item(category_id,"");
  }
});


      function category_based_item(category_id,item_id){
        $.ajax({
              type: "post",
              url: "{{ url('common/get-category-based-item-dets')}}",
              data: {category_id: category_id},
              success: function (res)
              {
                result = JSON.parse(res);
                $(".item_id").html(result.option);
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

function get_category_based_item(category_one_id,category_two_id,category_three_id,item_id)
{
  $.ajax({
              type: "post",
              url: "{{ url('common/get-category-based-item')}}",
              data: {category_one_id:category_one_id,category_two_id: category_two_id, category_three_id:category_three_id,item_id:item_id},
              success: function (res)
              {
                result = JSON.parse(res);
                $(".item_id").html(result.option);
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
    //get_category_two_based_category_three($(this).val(),category_three_id ="");
    get_category_based_item($(".category_1").val(),$(".category_2").val(),$(this).val(),item_id="");
  }
  
});

function s_no_generation()
{
  $(".s_no").each(function(key,index){
    $(this).html(key+1);
  });
}


function add_tax_details()
{
  var append='<tr>\
                <th scope="row" class="s_no">1</th>\
               <td>\
                      <div class="col-sm-12">\
                      <input type="text" class="form-control igst only_allow_digit_and_dot" name="igst[]" placeholder="IGST" value="" required>\
                        <div class="invalid-feedback">\
                          Enter valid IGST\
                        </div>\
                      </div>\
                    </td>\
                    <td>\
                    <div class="col-sm-12">\
                    <input type="text" class="form-control cgst only_allow_digit_and_dot" name="cgst[]" placeholder="CGST" value="" required>\
                    <div class="invalid-feedback">\
                        Enter valid CGST\
                      </div>\
                    </div>\
                  </td>\
                    <td>\
                      <div class="col-sm-12">\
                      <input type="text" class="form-control sgst only_allow_digit_and_dot" name="sgst[]" placeholder="SGST" value="" required>\
                        <div class="invalid-feedback">\
                          Enter valid SGST\
                        </div>\
                      </div>\
                    </td>\
                    <td>\
                      <div class="col-sm-12">\
                      <input type="text" class="form-control valid_from" name="valid_from[]" placeholder="dd-mm-yyyy" value="" required>\
                        <div class="invalid-feedback">\
                          Enter valid Effective From Date\
                        </div>\
                      </div>\
                    </td>\
                    <td>\
                      <div class="form-group row">\
                          <div class="col-sm-3">\
                          <label class="btn btn-success add_more">+</label>\
                          </div>\
                          <div class="col-sm-3 mx-2">\
                          <label class="btn btn-danger remove_row">-</label>\
                            </div>\
                        </div>\
                  </td>\
</tr>';
              $(".append_row").append(append);
              var currentDate = new Date();
    $('.valid_from').datepicker({
    format: "dd-mm-yyyy",
    todayHighlight: true,
    startDate: currentDate,
    endDate: '',
    setDate: currentDate,
    autoclose: true
    });

           
              

}

$(document).on("click",".add_more",function(){
  add_tax_details();
  s_no_generation();
  
});

$(document).on("click",".remove_row",function(){
if($(".remove_row").length > 1)
{
  $(this).closest("tr").remove();
  s_no_generation();

}else{
  alert("Atleast One Row Present");
}
});

$(document).on("click",".search_btn",function(){
  $.ajax({
              type: "post",
              url: "{{ url('master/item-tax-details/search-item-by-category')}}",
              data: {category_id:$(".search_category_id").val(),item_id: $(".search_item_id").val()},
              success: function (res)
              {
                result = JSON.parse(res);
                $(".append_row").html(result.page);

                $(".response_div").css("display","block");
                s_no_generation();
              }
          });
});




    




</script>


@endsection

