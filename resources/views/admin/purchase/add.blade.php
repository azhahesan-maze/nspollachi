@extends('admin.layout.app')
@section('content')
<style type="text/css">
  tbody#team-list {
    counter-reset: rowNumber;
}

tbody#team-list tr:nth-child(n+1) {
    counter-increment: rowNumber;
}

tbody#team-list tr:nth-child(n+1) td:first-child::before {
    content: counter(rowNumber);
    min-width: 1em;
    margin-right: 0.5em;
}
</style>
<div class="col-12 body-sec">
  <div class="card container-fluid px-0">
    <!-- card header start@ -->
    <div class="card-header px-2">
      <div class="row">
        <div class="col-4">
          <h3>Purchase Entry</h3>
        </div>
        <div class="col-8 mr-auto">
          <ul class="h-right-btn mb-0 pl-0">
            <li><button type="button" class="btn btn-success"><a href="{{ route('purchase.index') }}">Back</a></button></li>
          </ul>
        </div>
      </div>
    </div>
    <style>
    .table{
      font-size: 13px;
    }
    </style>
    <!-- card header end@ -->
    <div class="card-body">
    
      

        <!-- <div class="form-row">
          <div class="col-md-3">
            <div class="form-group row">
              <label for="voucher_no" class="col-sm-5 col-form-label">Voucher No </label>
              <div class="col-sm-7">
                <input type="text" class="form-control voucher_no only_allow_alp_num_dot_com_amp" placeholder="Voucher No" name="voucher_no" value="{{old('voucher_no')}}" required>
                <span class="mandatory"> {{ $errors->first('voucher_no')  }} </span>
                <div class="invalid-feedback">
                  Enter valid Voucher No
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-3">
            <div class="form-group row">
              <label for="voucher_no" class="col-sm-5 col-form-label">Voucher Date </label>
              <div class="col-sm-7">
                <input type="text" class="form-control voucher_no only_allow_alp_num_dot_com_amp" placeholder="Voucher Date" name="voucher_no" value="{{old('voucher_no')}}" required>
                <span class="mandatory"> {{ $errors->first('voucher_no')  }} </span>
                <div class="invalid-feedback">
                  Enter valid Voucher No
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-3">
            <div class="form-group row">
              <label for="voucher_no" class="col-sm-5 col-form-label">Gatepass No </label>
              <div class="col-sm-7">
                <input type="text" class="form-control voucher_no only_allow_alp_num_dot_com_amp" placeholder="Gatepass No" name="voucher_no" value="{{old('voucher_no')}}" required>
                <span class="mandatory"> {{ $errors->first('voucher_no')  }} </span>
                <div class="invalid-feedback">
                  Enter valid Voucher No
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-3">
            <div class="form-group row">
              <label for="voucher_no" class="col-sm-5 col-form-label">Receipt Note No.</label>
              <div class="col-sm-7">
                <input type="text" class="form-control voucher_no only_allow_alp_num_dot_com_amp" placeholder="Receipt Note No." name="voucher_no" value="{{old('voucher_no')}}" required>
                <span class="mandatory"> {{ $errors->first('voucher_no')  }} </span>
                <div class="invalid-feedback">
                  Enter valid Voucher No
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-3">
            <div class="form-group row">
              <label for="voucher_no" class="col-sm-5 col-form-label">Supplier Invoice No</label>
              <div class="col-sm-7">
                <input type="text" class="form-control voucher_no only_allow_alp_num_dot_com_amp" placeholder="Supplier Invoice No" name="voucher_no" value="{{old('voucher_no')}}" required>
                <span class="mandatory"> {{ $errors->first('voucher_no')  }} </span>
                <div class="invalid-feedback">
                  Enter valid Voucher No
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-3">
            <div class="form-group row">
              <label for="voucher_no" class="col-sm-5 col-form-label">Supplier Invoice Date</label>
              <div class="col-sm-7">
                <input type="text" class="form-control voucher_no only_allow_alp_num_dot_com_amp" placeholder="Supplier Invoice Date" name="voucher_no" value="{{old('voucher_no')}}" required>
                <span class="mandatory"> {{ $errors->first('voucher_no')  }} </span>
                <div class="invalid-feedback">
                  Enter valid Voucher No
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-3">
            <div class="form-group row">
              <label for="voucher_no" class="col-sm-5 col-form-label">Supplier Details</label>
              <div class="col-sm-7">
                <select class="js-example-basic-multiple col-12 custom-select bank_id" name="bank_id" required>
                  <option value="">Choose Supplier</option>
                </select>
                <span class="mandatory"> {{ $errors->first('voucher_no')  }} </span>
                <div class="invalid-feedback">
                  Enter valid Voucher No
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-3">
            <div class="form-group row">
              <label for="voucher_no" class="col-sm-5 col-form-label">Order Details</label>
              <div class="col-sm-7">
                <input type="text" class="form-control voucher_no only_allow_alp_num_dot_com_amp" placeholder="Order Details" name="voucher_no" value="{{old('voucher_no')}}" required>
                <span class="mandatory"> {{ $errors->first('voucher_no')  }} </span>
                <div class="invalid-feedback">
                  Enter valid Voucher No
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-3">
            <div class="form-group row">
              <label for="voucher_no" class="col-sm-5 col-form-label">Transport Details</label>
              <div class="col-sm-7">
                <input type="text" class="form-control voucher_no only_allow_alp_num_dot_com_amp" placeholder="Transport Details" name="voucher_no" value="{{old('voucher_no')}}" required>
                <span class="mandatory"> {{ $errors->first('voucher_no')  }} </span>
                <div class="invalid-feedback">
                  Enter valid Voucher No
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-3">
            <div class="form-group row">
              <label for="voucher_no" class="col-sm-5 col-form-label">Supplier Invoice Value</label>
              <div class="col-sm-7">
                <input type="text" class="form-control voucher_no only_allow_alp_num_dot_com_amp" placeholder="Supplier Invoice Value" name="voucher_no" value="{{old('voucher_no')}}" required>
                <span class="mandatory"> {{ $errors->first('voucher_no')  }} </span>
                <div class="invalid-feedback">
                  Enter valid Voucher No
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-3">
            <div class="form-group row">
              <label for="voucher_no" class="col-sm-5 col-form-label">Remarks</label>
              <div class="col-sm-7">
                <input type="text" class="form-control voucher_no only_allow_alp_num_dot_com_amp" placeholder="Remarks" name="voucher_no" value="{{old('voucher_no')}}" required>
                <span class="mandatory"> {{ $errors->first('voucher_no')  }} </span>
                <div class="invalid-feedback">
                  Enter valid Voucher No
                </div>
              </div>
            </div>
          </div>
</div> -->
<!-- <h3 class="py-2 font-weight-bold h3-i">Item Details</h3> -->





<form  method="post" class="form-horizontal" action="{{ route('purchase.store') }}" id="dataInput" enctype="multipart/form-data">
      {{csrf_field()}}
      <label>Batch No</label>
                       <div class="form-group row">
                                <div class="col-md-2">
                                <input type="text" class="form-control proof_file  required_for_proof_valid" placeholder="Batch_no" id="batch_no" name="batch_no" value="" required="">
                                 
                                </div>
                              </div>
<div class="form-row">
              <div class="col-md-8">
                       <div class="form-group row">
                       <div class="col-md-4">
                       <label for="validationCustom01" class=" col-form-label"><h4>Item Details:</h4> </label><br>
                       
                           
                       </div>
                         </div>
              </div>
              <div class="col-md-12">
                <table class="table" id="team-list">
                  <thead>
                    <th> S.no </th>
                    <th> Invoice S.no </th>
                    <th> Item Code</th>
                    <th> Item Name</th>
                    <th> MRP</th>
                    <th> HSN</th>
                    <th> Quantity</th>
                    <th> Tax Rate%</th>
                    <th> Inclusive/Exclusive</th>
                    <th> Rate Exclusive</th>
                    <th> Rate Inclusive</th>
                    <th> Amount</th>
                    <th> Discount</th>
                    <th> Net Price</th>
                    <th>Action </th>
                  </thead>
                  <tbody class="append_proof_details" id="mytable">
                    <tr id="row0" class="0 tables">
                      <td><span class="bank_s_no"> 1 </span></td>
                      <td>
                              <div class="form-group row">
                                <div class="col-sm-12">
                                <input type="text" class="form-control proof_file  required_for_proof_valid" placeholder="Invoice S.no" id="invoice_sno0" name="invoice_sno[]" value="" required="">
                                 
                                </div>
                              </div>
                            </td>
                      <td>
                        <div class="form-group row">
              <div class="col-sm-12">
                        <input list="item_code0" required="" id="item_codes0"  onchange="item_codes(0)"class="form-control" placeholder="Item Code" name="item_code[]">
                        <datalist id="item_code0" name="item_code[]" >
                          @foreach($items as $item)
                          <option value="{{ $item->code }}"></option>
                          @endforeach
                        </datalist>
                      </div>
          </div>

          
                      </td>
                      <td>
                              <div class="form-group row">
                                <div class="col-sm-12">
                                <input type="text" class="form-control proof_file  required_for_proof_valid" id="item_name0" placeholder="Item Name" name="item_name[]" readonly="" id="item_name" value="" required="">
                                 
                                </div>
                              </div>
                            </td>

                           <td>
                              <div class="form-group row">
                                <div class="col-sm-12">
                                <input type="text" class="form-control proof_file  required_for_proof_valid" readonly="" placeholder="MRP" id="mrp0" name="mrp[]" value="" required="">
                                 
                                </div>
                              </div>
                            </td> 

                            <td>
                              <div class="form-group row">
                                <div class="col-sm-12">
                                <input type="text" class="form-control proof_file  required_for_proof_valid" readonly="" placeholder="HSN" id="hsn0" name="hsn[]" value="" required="">
                                 
                                </div>
                              </div>
                            </td>
                   <td>
                            <div class="form-group row">
                              <div class="col-sm-12">
                              <input type="text" class="form-control proof_number only_allow_digit required_for_proof_valid" id="quantity0"  placeholder="Quantity" name="quantity[]" pattern="[0-9]{0,100}" title="Numbers Only" value="" required="">
                                
                              </div>
                            </div>
                          </td>

                          <td>
                              <div class="form-group row">
                                <div class="col-sm-12">
                                <input type="text" class="form-control proof_file  required_for_proof_valid" placeholder="Tax Rate%" name="tax_rate[]" value="" id="tax_rate0" required="">
                                 
                                </div>
                              </div>
                            </td> 

                            <td>
                              <div class="form-group row">

                                <div class="col-sm-12">
                                <input type="checkbox"  onclick="calc_tax1(0)" name="tax[]" id="tax0">
                                 <label>Inclusive Tax</label>
                                </div>
                                
                              </div>
                            </td>

                          <td>
                              <div class="form-group row">
                                <div class="col-sm-12" id="rate_exclusive">
                                <input type="text" class="form-control  required_for_proof_valid" id="exclusive0" placeholder="Exclusive Tax" onchange="calc(0)" name="exclusive[]" pattern="[0-9][0-9 . 0-9]{0,100}" title="Numbers Only" value="" required=""></div>
                                
                              </div>
                            </td>
                            <td>
                              <div class="form-group row">
                              <div class="col-sm-12"  id="rate_inclusive">
                                <input type="text" readonly="" class="form-control  required_for_proof_valid" id="inclusive0" placeholder="Inclusive Tax" onchange="calc(0)" name="inclusive[]" pattern="[0-9][0-9 . 0-9]{0,100}" title="Numbers Only" value="" required="">
                                 
                                </div>
                              </div>
                            </td>

                            <td>
                              <div class="form-group row">
                                <div class="col-sm-12">
                                <input type="text" readonly="" class="form-control proof_file  required_for_proof_valid" placeholder="Amount" id="amount0" pattern="[0-9][0-9 . 0-9]{0,100}" title="Numbers Only" name="amount[]" value="" >
                                 
                                </div>
                              </div>
                            </td>

                            <td>
                              <div class="form-group row">
                                <div class="col-sm-12">
                                <input type="text" class="form-control proof_file  required_for_proof_valid" placeholder="Discount" id="discount0" pattern="[0-9][0-9 . 0-9]{0,100}" title="Numbers Only" onchange="discount_calc(0)" name="discount[]" value="" >
                                 
                                </div>
                              </div>
                            </td>
                            
                            <td>
                              <div class="form-group row">
                                <div class="col-sm-12">
                                <input type="text" class="form-control proof_file  required_for_proof_valid" readonly="" id="net_price0" placeholder="Net Price" pattern="[0-9][0-9 . 0-9]{0,100}" title="Numbers Only" name="net_price[]" value="" required="">
                                 
                                </div>
                              </div>
                            </td>
                            <input type="hidden" name="last" value="0" id="last">
                            <input type="hidden" name="counts" value="1" id="counts">

                            <td>
                                <div class="form-group row">
                                    <div class="col-sm-2">
                                      <input type="submit" class="btn btn-success add_items" value="+" name="" id="add_items0">
                                    <!-- <label class="btn btn-success add_items">+</label> -->
                                    </div>&nbsp;&nbsp;&nbsp;
                                    <div class="col-sm-2">
                                      <input type="submit" id="0" class="btn btn-danger remove_items" value="-" name="">
                                      <!-- <label class="btn btn-danger remove_items">-</label> -->
                                      </div>
                                  </div>
                            </td>

                    </tr>

                  </tbody>

                </table>
                
                                <div class="row" style="float:right;">
                                <div class="col-md-5" >
                                  <label>Total Amount</label>
                                <input type="text" readonly="" align="right" class="form-control readonly  required_for_proof_valid" onclick="total_amounts()" id="total_amount" placeholder="Total Amount" name="total_amount" value="" required="">
                                 
                                </div>

                                <div class="col-md-5">
                                  <label>Total Net Price</label>
                                <input type="text" readonly="" class="form-control readonly  required_for_proof_valid" id="total_price" onclick="total_net_price()" placeholder="Total Net Price" name="total_price" value="" required="">
                                 
                                </div>
                         </div>
                      
                        
 

                       </div>

                       <div class="col-md-7 text-right">
          <button class="btn btn-success save" style="margin-bottom: 150px;" name="add" type="submit">Submit</button>
        </div>
      </form>
                       <!-- <div align="center">
                  <input type="submit" name="save" id="save" class="btn btn-success" value="Save">
                </div> -->
        <script type="text/javascript">
function add_items()
{
  var j=$('#mytable tr:last').attr('class');
 var i=parseInt(j)+1;
 
  var items='<tr id="row'+i+'" class="'+i+' tables"><td><span class="bank_s_no"> 1 </span></td><td><div class="form-group row"><div class="col-sm-12"><input type="text" class="form-control proof_file  required_for_proof_valid" placeholder="Invoice S.no" id="invoice_sno'+i+'" name="invoice_sno[]" value="" required=""></div></div></td><td><div class="form-group row"><div class="col-sm-12"><input list="item_code'+i+'" required="" id="item_codes'+i+'"  onchange="item_codes('+i+')"class="form-control" placeholder="Item Code" name="item_code[]"><datalist id="item_code'+i+'" name="item_code[]" >@foreach($items as $item)<option value="{{ $item->code }}"></option>@endforeach</datalist></div></div></td><td><div class="form-group row"><div class="col-sm-12"><input type="text" class="form-control proof_file  required_for_proof_valid" placeholder="Item Name" name="item_name[]" id="item_name'+i+'" value="" required=""></div></div></td><td><div class="form-group row"><div class="col-sm-12"><input type="text" class="form-control proof_file  required_for_proof_valid" placeholder="MRP" id="mrp'+i+'" name="mrp[]" value="" required=""></div></div></td><td><div class="form-group row"><div class="col-sm-12"><input type="text" class="form-control proof_file  required_for_proof_valid" placeholder="HSN" id="hsn'+i+'" name="hsn[]" value="" required=""></div></div></td><td><div class="form-group row"><div class="col-sm-12"><input type="text" class="form-control proof_number only_allow_digit required_for_proof_valid" id="quantity'+i+'"  placeholder="Quantity" name="quantity[]" pattern="[0-9]{0,100}" title="Numbers Only" value="" required=""></div></div></td><td><div class="form-group row"><div class="col-sm-12"><input type="text" class="form-control proof_file  required_for_proof_valid" placeholder="Tax Rate%" name="tax_rate[]" value="" id="tax_rate'+i+'" required=""></div></div></td><td><div class="form-group row"><div class="col-sm-12"><input type="checkbox" onclick="calc_tax1('+i+')" name="tax[]" value="1" id="tax"><label>Inclusive Tax</label></div></div></td><td><div class="form-group row"><div class="col-sm-12" id="rate_exclusive'+i+'"><input type="text" class="form-control  required_for_proof_valid" id="exclusive'+i+'" placeholder="Exclusive Tax" onchange="calc('+i+')" name="exclusive[]" pattern="[0-9][0-9 . 0-9]{0,100}" title="Numbers Only" value="" required=""></div></div></td><td><div class="form-group row"><div class="col-sm-12"  id="rate_inclusive"><input type="text" readonly class="form-control  required_for_proof_valid" id="inclusive'+i+'" placeholder="Inclusive Tax" onchange="calc('+i+')" name="inclusive[]" pattern="[0-9][0-9 . 0-9]{0,100}" title="Numbers Only" value="" required=""></div></div></td><td><div class="form-group row"><div class="col-sm-12"><input type="text" class="form-control proof_file  required_for_proof_valid" placeholder="Amount" id="amount'+i+'" pattern="[0-9][0-9 . 0-9]{0,100}" title="Numbers Only" name="amount[]" value="" ></div></div></td><td><div class="form-group row"><div class="col-sm-12"><input type="text" class="form-control proof_file  required_for_proof_valid" placeholder="Discount" id="discount'+i+'" pattern="[0-9][0-9 . 0-9]{0,100}" title="Numbers Only" onchange="discount_calc('+i+')" name="discount[]" value="" ></div></div></td><td><div class="form-group row"><div class="col-sm-12"><input type="text" class="form-control proof_file  required_for_proof_valid" id="net_price'+i+'" placeholder="Net Price" pattern="[0-9][0-9 . 0-9]{0,100}" title="Numbers Only" name="net_price[]" value="" required=""></div></div></td><td><div class="form-group row"><div class="col-sm-3"><input type="submit" class="btn btn-success add_items" value="+" name="" id="add_items'+i+'"></div>&nbsp;&nbsp;&nbsp;<div class="col-sm-3"><input type="submit" class="btn btn-danger remove_items"  id="'+i+'" value="-" name=""></div></div></td></tr>'
$('.append_proof_details').append(items);
$('#last').val(i);
var len=$('.tables').length;
$('#counts').val(len);
i++;
} 
$(document).on("click",".add_items",function(){
    add_items();
    bank_details_sno();

  });

$(document).on("click",".remove_items",function(){
  if($(".remove_items").length >1){

        var button_id = $(this).attr("id");
        
       $('#row'+button_id).remove();
       
       var counts = $('#counts').val();
       $('#counts').val(counts-1); 
       bank_details_sno();
        --i;
    
  }else{
    alert("Atleast One row present");
  }
});
function bank_details_sno(){
  $(".bank_s_no").each(function(key,index){
      $(this).html((key+1));
    });
}

// $(document).on("click",".save",function(){
//     var len=$('#mytable').length;
//     alert(len);

//   });

// $(document).ready(function(){
//   var result = [];
//   $('table tr').each(function(){
//     $('td', this).each(function(index, val){
//         if(!result[index]) result[index] = 0;
//       result[index] += parseInt($(val).text());
//     });
//   });

//   $('table').append('<tr></tr>');
//   $(result).each(function(){
//     $('table tr').last().append('<td>'+this+'</td>')
//   });
// });


function total_amounts()
{
  
  
  var sum=0;
  var count=$('#mytable tr:last').attr('class').split(' ')[0];
  
  
  for(i=0;i<=count;i++)
  {
    $('#amount')
    var tot_amnt=$('#amount'+i).val();
     if(tot_amnt == '')
     {
      
     }
     else
     {
     if(typeof $('#amount'+i).val() == 'undefined')
     {

     }
     else
     {
      sum=parseFloat(tot_amnt)+parseFloat(sum);
      
     }
    
    }
    
  }
  $('#total_amount').val(sum);
}

function total_net_price()
{
  
  var sum=0;
  var count=$('#mytable tr:last').attr('class').split(' ')[0];
  
  for(i=0;i<=count;i++)
  {
    var tot_amnt=$('#net_price'+i).val();
     if(tot_amnt == '')
     {
      
     }
     else
     {
     if(typeof $('#net_price'+i).val() == 'undefined')
     {

     }
     else
     {
      sum=parseFloat(tot_amnt)+parseFloat(sum);
      
     }
    
    }
    
  }
  $('#total_price').val(sum);
}


function calc(ival)
{
  var quantity = $('#quantity'+ival).val();
  var rate_exclusive = $('#exclusive'+ival).val();
  var rate_inclusive = $('#inclusive'+ival).val();

  if (quantity == '') 
  {
    alert('Please Enter Quantity First');
    $('#exclusive'+ival).val('');
    $('#inclusive'+ival).val('');
    $('#quantity'+ival).focus();
  }
  else
  {
    if(rate_exclusive)
    {
      var total = parseInt(quantity)*parseFloat(rate_exclusive);
    }
    else
    {
      var total = parseInt(quantity)*parseFloat(rate_inclusive);
    }
    
    $('#amount'+ival).val(total.toFixed(2));
    $('#net_price'+ival).val(total.toFixed(2));
  }
}

function calc_tax()
{
  
  $("#exclusive").attr('readonly','readonly');
  $("#inclusive").removeAttr('readonly');
  
}

function calc_tax1(ival)
{
  
  
  $("#inclusive"+ival).removeAttr('readonly');
  $("#exclusive"+ival).attr('readonly','readonly');
}

function discount_calc(ival)
{
  var discount = $("#discount"+ival).val();
  var amount = $("#amount"+ival).val();

  $("#net_price"+ival).val((parseFloat(amount)-parseFloat(discount)).toFixed(2));
}

function item_codes(ival)
{

var item_code=$('#item_codes'+ival).val();

      $.ajax({  
        //create an ajax request to display.php
        type: "GET",
        url: "{{ url('purchase/getdata/{id}') }}",
        data: { id: item_code },             
           //expect html to be returned                
        success: function(data){                    
             
            $('#item_name'+ival).val(data.name);
             $('#mrp'+ival).val(data.mrp);
             $('#hsn'+ival).val(data.hsn);
        }

    });

}

$('#dataInput').submit(function (e) { //Form is submitted, it calls this function automatically
    
  
    if($('#total_amount').val() == '')
    {
      alert('Please Fill Total Amount!');
      e.preventDefault();
    }
    else if($('#total_price').val() == '')
    {
      alert('Please Fill Total Net Price!');
      e.preventDefault();
    }
});

// $('#save').click(function(){

// var count=$('#mytable tr:last').attr('class');
// var batch_no = $('#batch_no').val();

//   var invoice_val = new Array();
//   var item_code_val = new Array();
//   var item_name_val = new Array();
//   var mrp_val = new Array();
//   var hsn_val = new Array();
//   var qty = new Array();
//   var tax_rate_val = new Array();
//   var inclusive_val = new Array();
//   var rate_exclusive_val = new Array();
//   var rate_inclusive_val = new Array();
//   var amount_val = new Array();
//   var discount_val = new Array();
//   var net_price_val = new Array();
// for(k=0;k<=count;k++)
// {

//   invoice_val.push($('#invoice_sno'+k).val());
//   item_code_val.push($('#item_code'+k).val());
//   item_name_val.push($('#item_name'+k).val());
//   mrp_val.push($('#mrp'+k).val());
//   hsn_val.push($('#hsn'+k).val());
//   quantity_val.push($('#quantity'+k).val());
//   tax_rate_val.push($('#tax_rate'+k).val());
//   inclusive_val.push($('#inclusive'+k).val());
//   rate_exclusive_val.push($('#rate_exclusive'+k).val());
//   rate_inclusive_val.push($('#rate_inclusive'+k).val());
//   amount_val.push($('#amount'+k).val());
//   discount_val.push($('#discount'+k).val());
//   net_price_val.push($('#net_price'+k).val());
// }


// $.ajax({  
//         //create an ajax request to display.php
//         method: "POST",
//         url: "{{ url('purchase/storedata') }}",
//         data: { count:count, batch_no:batch_no, invoice_no: JSON.stringify(invoice_val), item_code:JSON.stringify(item_code_val), item_name:JSON.stringify(item_name_val), mrp:JSON.stringify(mrp_val), hsn:JSON.stringify(hsn_val), quantity:JSON.stringify(quantity_val), tax_rate:JSON.stringify(tax_rate_val), inclusive:JSON.stringify(inclusive_val), rate_exclusive:JSON.stringify(rate_exclusive_val), rate_inclusive:JSON.stringify(rate_inclusive_val), amount:JSON.stringify(amount_val), discount:JSON.stringify(discount_val), net_price:JSON.stringify(discount_val)},             
//            //expect html to be returned                
//         success: function(data)
//         {                    
             
//             alert(data);
//         }

//     });

// });


</script>


<!-- <div class="form-row">
  <div class="col-md-3">
    <div class="form-group row">
      <label for="voucher_no" class="col-sm-5 col-form-label">Item Code </label>
      <div class="col-sm-7">
        <input type="text" class="form-control voucher_no only_allow_alp_num_dot_com_amp" placeholder="item Code" name="voucher_no" value="{{old('voucher_no')}}" required>
        <span class="mandatory"> {{ $errors->first('voucher_no')  }} </span>
        <div class="invalid-feedback">
          Enter valid Voucher No
        </div>
      </div>
    </div>
  </div>

  <div class="col-md-3">
    <div class="form-group row">
      <label for="voucher_no" class="col-sm-5 col-form-label">Item Name </label>
      <div class="col-sm-7">
        <input type="text" class="form-control voucher_no only_allow_alp_num_dot_com_amp" placeholder="Item Name" name="voucher_no" value="{{old('voucher_no')}}" required>
        <span class="mandatory"> {{ $errors->first('voucher_no')  }} </span>
        <div class="invalid-feedback">
          Enter valid Voucher No
        </div>
      </div>
    </div>
  </div>

  <div class="col-md-3">
    <div class="form-group row">
      <label for="voucher_no" class="col-sm-5 col-form-label">Mrp </label>
      <div class="col-sm-7">
        <input type="text" class="form-control voucher_no only_allow_alp_num_dot_com_amp" placeholder="MRP" name="voucher_no" value="{{old('voucher_no')}}" required>
        <span class="mandatory"> {{ $errors->first('voucher_no')  }} </span>
        <div class="invalid-feedback">
          Enter valid Voucher No
        </div>
      </div>
    </div>
  </div>

  <div class="col-md-3">
    <div class="form-group row">
      <label for="voucher_no" class="col-sm-5 col-form-label">Qty</label>
      <div class="col-sm-7">
        <input type="text" class="form-control voucher_no only_allow_alp_num_dot_com_amp" placeholder="Qty" name="voucher_no" value="{{old('voucher_no')}}" required>
        <span class="mandatory"> {{ $errors->first('voucher_no')  }} </span>
        <div class="invalid-feedback">
          Enter valid Voucher No
        </div>
      </div>
    </div>
  </div>

  <div class="col-md-3">
    <div class="form-group row">
      <label for="voucher_no" class="col-sm-5 col-form-label">Tax Rate % </label>
      <div class="col-sm-7">
        <input type="text" class="form-control voucher_no only_allow_alp_num_dot_com_amp" placeholder="Tax Rate % " name="voucher_no" value="{{old('voucher_no')}}" required>
        <span class="mandatory"> {{ $errors->first('voucher_no')  }} </span>
        <div class="invalid-feedback">
          Enter valid Voucher No
        </div>
      </div>
    </div>
  </div>

  <div class="col-md-3">
    <div class="form-group row">
      <label for="voucher_no" class="col-sm-5 col-form-label">Rate (Inclusive Tax)</label>
      <div class="col-sm-7">
        <input type="text" class="form-control voucher_no only_allow_alp_num_dot_com_amp" placeholder="Rate (Inclusive Tax)" name="voucher_no" value="{{old('voucher_no')}}" required>
        <span class="mandatory"> {{ $errors->first('voucher_no')  }} </span>
        <div class="invalid-feedback">
          Enter valid Voucher No
        </div>
      </div>
    </div>
  </div>

  <div class="col-md-3">
    <div class="form-group row">
      <label for="voucher_no" class="col-sm-5 col-form-label">Rate (Exclusive Tax)</label>
      <div class="col-sm-7">
        <input type="text" class="form-control voucher_no only_allow_alp_num_dot_com_amp" placeholder="Rate (Exclusive Tax)" name="voucher_no" value="{{old('voucher_no')}}" required>
        <span class="mandatory"> {{ $errors->first('voucher_no')  }} </span>
        <div class="invalid-feedback">
          Enter valid Voucher No
        </div>
      </div>
    </div>
  </div>


  <div class="col-md-3">
    <div class="form-group row">
      <label for="voucher_no" class="col-sm-5 col-form-label">Discount</label>
      <div class="col-sm-7">
        <input type="text" class="form-control voucher_no only_allow_alp_num_dot_com_amp" placeholder="Discount" name="voucher_no" value="{{old('voucher_no')}}" required>
        <span class="mandatory"> {{ $errors->first('voucher_no')  }} </span>
        <div class="invalid-feedback">
          Enter valid Voucher No
        </div>
      </div>
    </div>
  </div>

  
  <div class="col-md-3">
    <div class="form-group row">
      <label for="voucher_no" class="col-sm-5 col-form-label">Amount</label>
      <div class="col-sm-7">
        <input type="text" class="form-control voucher_no only_allow_alp_num_dot_com_amp" placeholder="Amount" name="voucher_no" value="{{old('voucher_no')}}" required>
        <span class="mandatory"> {{ $errors->first('voucher_no')  }} </span>
        <div class="invalid-feedback">
          Enter valid Voucher No
        </div>
      </div>
    </div>
  </div>

  <div class="col-md-3 text-left">
    <button class="btn btn-success" name="add" type="submit">Add</button>
  </div>
</div> -->

<!-- <div class="row">
    <div class="col-md-12">
<div class="form-row custom-table">
               <table class="table table-bordered " style="margin-top: 20px;">
                  <thead class="thead-gray"> -->
                  <!-- <tr>
                        <th class="text-center" rowspan="1" colspan="10">Common</th>
                     </tr> -->
                     <!-- <tr>
                        <th class="text-center">S.No</th>
                        <th class="text-center">Item Code</th>
                        <th class="text-center">Description</th>
                        <th class="text-center">Rate Rs.</th>
                        <th class="text-center">Qty</th> -->
                        <!-- <th class="text-center">UOM</th> -->
                        <!-- <th class="text-center">Rate </th> -->
<!--                         <th class="text-center">Amount</th>
                        <th class="text-center">Discount</th>
                        <th class="text-center">Tax Rs.</th>
                        <th class="text-center">Net Value</th>
                        <th class="text-center">Action</th>
                     </tr>
                  </thead>

                  <tfoot class="thead-gray">
                    <tr>
                      <th class="text-right" colspan="6">Total</th>
                      <th class="text-center"></th>
                      <th class="text-center"></th>
                      <th class="text-center"></th>
                      <th class="text-center" colspan="2"></th>
                    
                   </tr>
                    </tfoot>
                  <tbody class="append_barcode_dets">
                    <?php for($i=0;$i<10;$i++) {?>
                     <tr>
                     <td> {{$i+1}} </td>
                       <td></td>
                       <td></td>
                       <td></td>
                       <td></td>
                       <td></td>
                       <td></td>
                       <td></td>
                       <td></td>
                       <td></td>
                     </tr>
                    <?php } ?>
                
                     
                  </tbody>
                 
               </table>
            </div>
            </div>

            <div class="col-md-5">
              <div class="form-row custom-table price-tbl">
                <table class="table table-bordered table-responsive">
                    <tr class="thead-gray">
                      <th rowspan="1" colspan="6">Price Level</th>
                      <th rowspan="1" colspan="2">%</th>
                      <th rowspan="1" colspan="2">Rate</th>
                    </tr>
                    <tr>
                      <th>S.No</th>
                      <th class="cus-wd">Item Name</th>
                      <th class="cus-wd">Purchase Cost</th>
                      <th>MRP</th>
                      <th class="cus-wd">Last Purchase Rate(LPR)</th>
                      <th class="cus-wd">Updated Sales Price</th>
                      <th>Markup</th>
                      <th>MarkDown</th>
                      <th>Markup</th>
                      <th>MarkDown</th>
                    </tr>
                    <tbody>
                      <tr>
                        <td>1</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                      </tr>
                      <tr>
                        <td>2</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                      </tr>
                      <tr>
                        <td>3</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                      </tr>
                      <tr>
                        <td>4</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                      </tr>
                      <tr>
                        <td>5</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                      </tr>
                    </tbody>

                  </table>
              </div>      
            </div>
</div> -->


        

    </div>
    <!-- card body end@ -->
  </div>
</div>
@endsection

