@extends('admin.layout.app')
@section('content')
<div class="col-12 body-sec">
  <div class="card container px-0">
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
    
      <form  method="post" class="form-horizontal needs-validation" novalidate action="{{url('master/item-tax-details/store')}}" enctype="multipart/form-data">
      {{csrf_field()}}



        <div class="form-row">
          

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
                        <label for="validationCustom01" class="col-sm-4 col-form-label">Item </label>
                        <div class="col-sm-8">
                          <select class="js-example-basic-multiple col-12 form-control custom-select item_id" name="item_id" required>
                            <option value="">Choose Item </option>
                          </select>
                          <span class="mandatory"> {{ $errors->first('item_id')  }} </span>
                         <div class="invalid-feedback">
                            Enter valid Item Name
                          </div>
                        </div>
                      </div>
                    </div>
                                  
 </div>

 <div class="form-row">
       <table class="table table-bordered">
        <thead>
          <tr>
            <th scope="col" style="width:6%">S.no</th>
            <th scope="col" style="width:20%">CGST (%) </th>
            <th scope="col" style="width:20%">IGST (%) </th>
            <th scope="col" style="width:20%">SGST (%) </th>
            <th scope="col" style="width:20%">Effective From </th>
            <th scope="col" style="width:14%">Action</th>
          </tr>
        </thead>
        <tbody class="append_row">

            <tr>
                <th scope="row" class="s_no">1</th>
                <td>
                    <div class="col-sm-12">
                    <input type="text" class="form-control cgst only_allow_digit_and_dot" name="cgst[]" placeholder="CGST" value="{{old('cgst.0')}}" required>
                     <span class="mandatory"> {{ $errors->first('cgst.0')  }} </span>
                      <div class="invalid-feedback">
                        Enter valid CGST
                      </div>
                    </div>
                  </td>

                  <td>
                      <div class="col-sm-12">
                      <input type="text" class="form-control igst only_allow_digit_and_dot" name="igst[]" placeholder="IGST" value="{{old('igst.0')}}" required>
                       <span class="mandatory"> {{ $errors->first('igst.0')  }} </span>
                        <div class="invalid-feedback">
                          Enter valid IGST
                        </div>
                      </div>
                    </td>

                    <td>
                        <div class="col-sm-12">
                        <input type="text" class="form-control sgst only_allow_digit_and_dot" name="sgst[]" placeholder="SGST" value="{{old('sgst.0')}}" required>
                         <span class="mandatory"> {{ $errors->first('sgst.0')  }} </span>
                          <div class="invalid-feedback">
                            Enter valid SGST
                          </div>
                        </div>
                      </td>

                      <td>
                          <div class="col-sm-12">
                            @php
                                $old_value_0=old('valid_from.0') !="" ? date('d-m-Y',strtotime(old('valid_from.0'))) : "";
                            @endphp
                          <input type="text" class="form-control valid_from" name="valid_from[]" placeholder="dd-mm-yyyy" value="{{$old_value_0}}" required>
                           <span class="mandatory"> {{ $errors->first('valid_from.0')  }} </span>
                            <div class="invalid-feedback">
                              Enter valid Effective From Date
                            </div>
                          </div>
                        </td>
                  <td>
                      <div class="form-group row">
                          <div class="col-sm-3">
                          <label class="btn btn-success add_more">+</label>
                          </div>
                          <div class="col-sm-3 mx-2">
                          <label class="btn btn-danger remove_row">-</label>
                            </div>
                        </div>
                  </td>
              </tr>

              @if (old('cgst'))
              @foreach (old('cgst') as $old_key=>$old_value)
              @if($old_key > 0)

              <tr>
                  <th scope="row" class="s_no">1</th>
                  <td>
                      <div class="col-sm-12">
                      <input type="text" class="form-control cgst only_allow_digit_and_dot" name="cgst[]" placeholder="CGST" value="{{old('cgst.'.$old_key)}}" required>
                       <span class="mandatory"> {{ $errors->first('cgst.'.$old_key)  }} </span>
                        <div class="invalid-feedback">
                          Enter valid CGST
                        </div>
                      </div>
                    </td>
  
                    <td>
                        <div class="col-sm-12">
                        <input type="text" class="form-control igst only_allow_digit_and_dot" name="igst[]" placeholder="IGST" value="{{old('igst.'.$old_key)}}" required>
                         <span class="mandatory"> {{ $errors->first('igst.'.$old_key)  }} </span>
                          <div class="invalid-feedback">
                            Enter valid IGST
                          </div>
                        </div>
                      </td>
  
                      <td>
                          <div class="col-sm-12">
                          <input type="text" class="form-control sgst only_allow_digit_and_dot" name="sgst[]" placeholder="SGST" value="{{old('sgst.'.$old_key)}}" required>
                           <span class="mandatory"> {{ $errors->first('sgst.'.$old_key)  }} </span>
                            <div class="invalid-feedback">
                              Enter valid SGST
                            </div>
                          </div>
                        </td>
  
                        <td>
                        
                            <div class="col-sm-12">
                            <input type="text" class="form-control valid_from" name="valid_from[]" placeholder="dd-mm-yyyy" value="{{old('valid_from.'.$old_key)}}" required>
                             <span class="mandatory"> {{ $errors->first('valid_from.'.$old_key)  }} </span>
                              <div class="invalid-feedback">
                                Enter valid Effective From Date
                              </div>
                            </div>
                          </td>
                    <td>
                        <div class="form-group row">
                            <div class="col-sm-3">
                            <label class="btn btn-success add_more">+</label>
                            </div>
                            <div class="col-sm-3 mx-2">
                            <label class="btn btn-danger remove_row">-</label>
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
        <div class="col-md-7 text-right">
          <button class="btn btn-success" name="add" type="submit">Submit</button>
        </div>
      </form>
    </div>
    <!-- card body end@ -->
  </div>
</div>


<script>

$(document).ready(function () {
  var today = new Date(new Date().getFullYear(), new Date().getMonth(), new Date().getDate());
       $('.valid_from').datepicker({
           uiLibrary: 'bootstrap4',
           iconsLibrary: 'fontawesome',
           format: 'dd-mm-yyyy',
           minDate: today
       });
      
       });

      


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
                    <input type="text" class="form-control cgst only_allow_digit_and_dot" name="cgst[]" placeholder="CGST" value="" required>\
                    <div class="invalid-feedback">\
                        Enter valid CGST\
                      </div>\
                    </div>\
                  </td>\
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
              $('.valid_from').datepicker({
           uiLibrary: 'bootstrap4',
           iconsLibrary: 'fontawesome',
           format: 'dd-mm-yyyy',
           minDate: today
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




    




</script>


@endsection

