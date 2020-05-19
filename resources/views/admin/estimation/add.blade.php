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
          <h3>Estimation</h3>
        </div>
        <div class="col-8 mr-auto">
          <ul class="h-right-btn mb-0 pl-0">
            <li><button type="button" class="btn btn-success"><a href="{{ route('estimation.index') }}">Back</a></button></li>
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
    


<style type="text/css">
  #middlecol {
   
    width: 45%;
  }

  #middlecol table {
    max-width: 99%;
    width: 100% !important;
  }
</style>


<form  method="post" class="form-horizontal" action="{{ route('estimation.store') }}" id="dataInput" enctype="multipart/form-data">
      {{csrf_field()}}

      
                       <div class="row col-md-10">

                                <div class="col-md-2">
                                  <label style="font-family: Times new roman;">Voucher No</label><br>
                                  <div class="">
                                    <!-- <input type="text" readonly="" class="form-control proof_file  required_for_proof_valid" id="voucher_no" placeholder="Auto Generate Voucher No" name="voucher_no" value=""> -->
                                    <font size="2">{{ $voucher_no }}</font>
                                  </div>
                                
                                 
                                </div>

                                <div class="col-md-2">
                                  <label style="font-family: Times new roman;">Voucher Date</label><br>
                                <input type="date" class="form-control voucher_date  required_for_proof_valid" id="voucher_date" placeholder="Voucher Date" name="voucher_date" value="{{ $date }}">
                                 
                                </div>
                                <div class="col-md-3">
                                  <label style="font-family: Times new roman;">Party Name</label><br>
                                <select class="js-example-basic-multiple form-control supplier_id" 
                                data-placeholder="Choose Supplier Name" required="" id="supplier_id" onchange="supplier_details()" name="supplier_id" >
                                <option value=""></option>
                                   @foreach($supplier as $suppliers)
                                   <option value="{{ $suppliers->id }}">{{ $suppliers->name }}</option>
                                   @endforeach
                                 </select>
                                 
                                </div>
                                <div class="col-md-2">
                                  <label style="font-family: Times new roman;">Party Address</label><br>
                                  <input type="hidden" name="address_line_1" id="address_line_1">
                                  <!-- <input type="text" name="address_line_2" id="address_line_2">
                                  <input type="text" name="city_id" id="city_id">
                                  <input type="text" name="district_id" id="district_id">
                                  <input type="text" name="state_id" id="state_id">
                                  <input type="text" name="postal_code" id="postal_code"> -->
                                  <div class="address">
                                    
                                  </div>
                                
                                 
                                </div>
                                </div>

                                <div class="row col-md-12">

                                <div class="col-md-2">
                                  <label style="font-family: Times new roman;">Agent Name</label><br>
                                <select class="js-example-basic-multiple form-control" 
                                data-placeholder="Choose Agent Name" required="" id="agent_id" name="agent_id" >
                                <option value=""></option>
                                   @foreach($agent as $agents)
                                   <option value="{{ $agents->id }}">{{ $agents->name }}</option>
                                   @endforeach
                                 </select>
                                 
                                </div>
                              </div>
                              <br>
    
      <div class="col-md-8">
                       <div class="form-group row">
                       <div class="col-md-4">
                       <label for="validationCustom01" class=" col-form-label"><h4>Item Details:</h4> </label><br>
                       
                           
                       </div>
                         </div>
              </div>

      <div class="row col-md-12">
        <div class="col-md-2">
          <label style="font-family: Times new roman;">Item Bill S.No</label>
        <input type="text" class="form-control item_sno  required_for_proof_valid" placeholder="Item S.no" id="item_sno" name="item_sno" value="">
         
        </div>

        <div class="col-md-2">
          <label style="font-family: Times new roman;">Item Code</label>
          <input type="text" class="form-control item_code  required_for_proof_valid" placeholder="Item Code" id="item_code" name="item_code" value="" onchange="get_details()">

          <input type="hidden" class="form-control items_codes  required_for_proof_valid" placeholder="Item Code" id="items_codes" name="items_codes" value="">
          
              <!-- <select class="js-example-basic-multiple form-control items_codes" 
              data-placeholder="Choose Item Code" id="items_codes" onchange="item_codes()" name="item_code" >
              <option value=""></option>
                  @foreach($item as $items)
                  <option value="{{ $items->id }}">{{ $items->code }}</option>
                  @endforeach
               </select> -->
               
              </div>
              
                      <div class="cat" id="cat" style="display: none;" title="Search Here">
                        
                        <select class="js-example-basic-multiple form-control categories" id="categories" name="category" style="width: 100%;" style="margin-left: 50%;" data-placeholder="Choose Category" onchange="categories_check()">
                          <option></option>
                          @foreach($categories as $category)
                          <option value="{{ $category->id }}">{{ $category->name }}</option>
                          @endforeach
                        </select><br><br>
                        <select class="js-example-basic-multiple form-control codes" id="codes" name="codes" style="width: 100%;" style="margin-left: 50%;" data-placeholder="Choose Item Code" onchange="code_check()">
                          <option></option>
                          @foreach($item as $items)
                          <option value="{{ $items->id }}">{{ $items->code }}</option>
                          @endforeach
                        </select>
                      </div>

                      <!-- <div class="code" id="code" style="display: none;" title="Choose Item Code">
                        
                        <select class="js-example-basic-multiple form-control codes" id="codes" name="codes" style="width: 100%;" style="margin-left: 50%;" data-placeholder="Choose Item Code" onchange="code_check()">
                          <option></option>
                          @foreach($item as $items)
                          <option value="{{ $items->id }}">{{ $items->code }}</option>
                          @endforeach
                        </select>
                      </div> -->

                      <div class="col-md-2">
                        <label><font color="white" style="font-family: Times new roman;">Find</font></label><br>
                      <input type="button" onclick="find_cat()" class="btn btn-info" value="Find" name="" id="find">
                    </div>
                    <div class="col-md-2">
                      <label style="font-family: Times new roman;">Item Name</label>
                      <input type="text" class="form-control item_name  required_for_proof_valid" id="item_name" placeholder="Item Name" name="item_name" readonly="" id="item_name" value="">
                    </div>
                    <div class="col-md-2">
                      <label style="font-family: Times new roman;">MRP</label>
                      <input type="text" class="form-control mrp required_for_proof_valid" readonly="" placeholder="MRP" id="mrp" name="mrp" value="">
                       
                      </div>

                      <input type="hidden" class="form-control hsn  required_for_proof_valid"  placeholder="HSN" id="hsn" name="hsn" value="">

                      <input type="hidden" class="form-control uom  required_for_proof_valid"  placeholder="UOM" id="uom" name="uom" value="">

                      <input type="hidden" class="form-control uom_name  required_for_proof_valid"  placeholder="UOM" id="uom_name" name="uom_name" value="">

                    <div class="col-md-2">
                        <label style="font-family: Times new roman;">Quantity</label>
                      <input type="text" class="form-control quantity" id="quantity"  placeholder="Quantity" name="quantity" pattern="[0-9]{0,100}" title="Numbers Only" value="">
                      </div>
                      </div>
                      


                      <div class="row col-md-12">
                        <div class="col-md-2">
                        <label style="font-family: Times new roman;">Tax Rate%</label>
                      <input type="text" class="form-control tax_rate  required_for_proof_valid" readonly="" placeholder="Tax Rate%" name="tax_rate" value="" id="tax_rate">
                      </div>
                      <input type="hidden" class="form-control gst  required_for_proof_valid" readonly="" placeholder="Tax Rate" name="gst" value="" id="gst">
                      
                      <div class="col-md-2" id="rate_exclusive">
                        <label style="font-family: Times new roman;">Rate Exclusive Tax</label>
                      <input type="text" class="form-control exclusive_rate" id="exclusive" placeholder="Exclusive Tax" style="margin-right: 80px;" onchange="calc_exclusive()" name="exclusive" pattern="[0-9][0-9 . 0-9]{0,100}" title="Numbers Only" value="">
                      </div>
                      <div class="col-md-2"  id="rate_inclusive">
                        <label style="font-family: Times new roman;">Rate Inclusive Tax</label>
                      <input type="text" class="form-control inclusive_rate" id="inclusive" placeholder="Inclusive Tax" onchange="calc_inclusive()" name="inclusive" pattern="[0-9][0-9 . 0-9]{0,100}" title="Numbers Only" value="">
                      </div>
                      <div class="col-md-2">
                        <label style="font-family: Times new roman;">Discount %</label>
                      <input type="text" class="form-control discount_percentage" onchange="discount_calc1()" id="discount_percentage"  placeholder="Discount %" name="discount_percentage" pattern="[0-9]{0,100}" title="Numbers Only" value="">
                      </div>

                      <input type="hidden" class="form-control amount  required_for_proof_valid" placeholder="Amount" id="amount" pattern="[0-9][0-9 . 0-9]{0,100}" title="Numbers Only" name="amount" value="" >
                        
                      
                      <div class="col-md-2">
                          <label style="font-family: Times new roman;">Discount Rs</label>
                        <input type="text" class="form-control discount_rs  required_for_proof_valid" placeholder="Discount Rs" id="discount" pattern="[0-9][0-9 . 0-9]{0,100}" title="Numbers Only" onchange="discount_calc()" name="discount" value="" >
                        </div>

                        <input type="hidden" name="disc_total" id="disc_total" value="0">

                        <input type="hidden" class="form-control net_price  required_for_proof_valid" id="net_price" placeholder="Net Price" pattern="[0-9][0-9 . 0-9]{0,100}" title="Numbers Only" name="net_price" value="">

                    </div>
                      <br>
                                                          
                     <div class="" align="center">
                                   
                    <input type="button" class="btn btn-success add_items" value="Add More" name="" id="add_items0">  

                    <input type="button" style="display: none" class="btn btn-success update_items" value="Update" name="" id="update_items">  
                     </div> <br>              
                   
<style>
table, th, td {
  border: 1px solid #E1E1E1;
}
</style>
<div class="form-row">
             
              <div class="col-md-12" id="middlecol">
                
                <table class="table" id="team-list">
                  <thead>
                    <th> S.no </th>
                    <th> Item S.no </th>
                    <th> Item Code</th>
                    <th> Item Name</th>
                    <th> HSN</th>
                    <th> MRP</th>
                    <th> Unit Price</th>
                    <th> Quantity</th>
                    <th> UOM</th>
                    <th> Amount</th>
                    <th> Discount</th>
                    <th> GST Rs</th>
                    <th> Net Value</th>
                    <th style="background-color: #FAF860;"> Last Purchase Rate(LPR)</th>
                    <th>Action </th>
                  </thead>
                  <tbody class="append_proof_details" id="mytable">
                    
                            <input type="hidden" name="counts" value="" id="counts">
                            <input type="hidden" name="expense_count" value="1" id="expense_count">
                            <input type="hidden" name="total_amount" value="0" id="total_amount">
                            <input type="hidden" name="total_gst" value="0" id="total_gst">
                            <input type="hidden" name="total_price" value="0" id="total_price">

                  </tbody>
                  <tfoot>
                    <tr>
                      
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th><label class="total_amount"></label></th>
                      <th></th>
                      <th></th>
                      <th><label class="total_net_price"></label></th>
                      <th style="background-color: #FAF860;"></th>
                      <th></th>
                    </tr>
                  </tfoot>

                </table>
                
                       </div>
                       <div class="row col-md-12">

                        <div class="col-md-2">
                        <label style="font-family: Times new roman;">Discount(-)</label>
                      <input type="text" class="form-control total_discount" id="total_discount" name="total_discount" pattern="[0-9]{0,100}" title="Numbers Only" value="0">
                      </div>
                    </div>


                    <!-- <div class="row col-md-12">
                            <div class="col-md-2">
                              <label style="font-family: Times new roman;">Expense Type</label>
                            </div>
                            <div class="col-md-2">
                              <label style="font-family: Times new roman;">Expense Amount</label>
                            </div>
                          </div> -->
                        <div class="row col-md-12 append_expense">

                          <div class="row col-md-12 expense">
                        <div class="col-md-2">
                          <label style="font-family: Times new roman;">Expense Type</label>
                        <select class="js-example-basic-multiple form-control" 
                        data-placeholder="Choose Expense Type" id="expense_type" name="expense_type[]" >
                        <option value=""></option>
                        @foreach($expense_type as $expense_types)
                        <option value="{{ $expense_types->id}}">{{ $expense_types->name}}</option>
                        @endforeach
                           
                         </select>
                         
                        </div>
                      <div class="col-md-2">
                        <label style="font-family: Times new roman;">Expense Amount</label>
                      <input type="text" class="form-control expense_amount" id="expense_amount"  placeholder="Expense Amount" name="expense_amount[]" pattern="[0-9]{0,100}" title="Numbers Only" value="">
                      </div>
                      <div class="col-md-2">
                        <label style="font-family: Times new roman; color: white;">Add Expense</label><br>
                      <input type="button" class="btn btn-success" value="+" onclick="expense_add()" name="" id="add_expense">&nbsp;<input type="button" class="btn btn-danger remove_expense" value="-" name="" id="remove_expense">
                    </div>
                  </div>
                    
                       </div>


                       <div class="row col-md-12">

                        <div class="col-md-2">
                        <label style="font-family: Times new roman;">Round Off(+/-)</label>
                      <input type="text" class="form-control round_off" id="round_off" name="round_off" >
                      </div>
                        
                        <div class="col-md-2">
                        <label style="font-family: Times new roman;">CGST</label>
                      <input type="text" class="form-control cgst" id="cgst" name="cgst" value="0">
                      </div>

                      <div class="col-md-2">
                        <label style="font-family: Times new roman;">SGST</label>
                      <input type="text" class="form-control sgst" id="sgst" name="sgst" value="0">
                      </div>
                      <div class="col-md-4" style="float: right;">

                        <font color="black" style="font-size: 150%; margin-left: 100px; font-weight: 900;">NET Value :</font>&nbsp;<font class="total_net_value" style="font-size: 150%; font-weight: 900;"></font> 
                       </div>
                       
                       <div class="row col-md-12">
                         <div class="col-md-2">
                           <label style="font-family: Times new roman;">IGST</label>
                      <input type="text" class="form-control igst" id="igst" name="igst" value="0">
                         </div>
                       </div>

                       

                       <div class="col-md-7 text-right">
          <input type="submit" class="btn btn-success save" style="margin-bottom: 150px;" name="save" value="Save" disabled="">
        </div>
      </form>
                       
        <script type="text/javascript">
          var i=0;
          var discount_total = 0;

function calculate_total_net_price(){
  var total_net_price=0;
  $(".table_net_price").each(function(){
    total_net_price=parseFloat(total_net_price)+parseFloat($(this).val());
  });
  return total_net_price;
}
function calculate_total_amount(){
  var total_amount=0;
  $(".table_amount").each(function(){
    total_amount=parseFloat(total_amount)+parseFloat($(this).val());
  });
  return total_amount;
}
function calculate_total_gst(){
  var total_gst=0;
  $(".table_gst").each(function(){
    total_gst=parseFloat(total_gst)+parseFloat($(this).val());
  });
  return total_gst;
}
function add_items()
{
  var j=$('#mytable tr:last').attr('class');
 var l=parseInt(i)+1;
 var voucher_date=$('.voucher_date').val();
 var invoice_no=$('.item_sno').val();
 var uom_name = $('.uom_name').val();
 var uom_id = $('.uom').val();
 // var item_code=$("#items_codes option:selected");
 // var item_code=item_code.text();
 var item_code=$("#item_code").val();
 var items_codes=$('#items_codes').val();
 var item_name=$('.item_name').val();
 var mrp=$('.mrp').val();
 var hsn=$('.hsn').val();
 var gst=$('.gst').val();
 var quantity=$('.quantity').val();
 var tax_rate=$('.tax_rate').val();
 var exclusive=$('#exclusive').val();
 var inclusive=$('#inclusive').val();
 var amount=$('.amount').val();
 var discount=$('#discount').val();
 var discount_percentage=$('.discount_percentage').val();
 var net_price=$('.net_price').val();
 

 
  if(discount == '' && discount_percentage != '')
   {
    var discount=discount_percentage+'%';
   }

   else if(discount_percentage == '' && discount != '')
   {
    var discount=discount;
   }
   else if(discount_percentage == '' && discount == '')
   {
    var discount=0;
   }

 
 if(amount == '')
 {
  var amount=0;
 }
 if(net_price == '')
 {
  var net_price=0;
 }

 if(items_codes == '' || invoice_no == '' || quantity == '' || exclusive == '' && inclusive == '')
 {
  alert('Please Fill All The Input Fields');
 }
 else if($('.discount').val() != '' && $('.discount_percentage').val() != '')
 {
  alert('You cannot insert Both Discount,Choose Any One Of That!');
    $('#discount').val('');
    $('.discount_percentage').val('');
    $('#exclusive').val('');
    $('#inclusive').val('');
    $('.amount').val('');
    $('.net_price').val('');
    ('.gst').val('');
 }
 else
 {
 
  var items='<tr id="row'+i+'" class="'+i+' tables"><td><span class="bank_s_no"> 1 </span></td><td><div class="form-group row"><div class="col-sm-12"><input class="invoice_no'+i+'" type="hidden" id="invoice'+i+'" value="'+invoice_no+'" name="invoice_sno[]">'+invoice_no+'</div></div></td><td class="items'+i+'"><div class="form-group row"><div class="col-sm-12"><input type="hidden" class="item_code'+i+'" value="'+items_codes+'" name="item_code[]">'+item_code+'</div></div></td><td><div class="form-group row"><div class="col-sm-12"><input class="item_name'+i+'" type="hidden" value="'+item_name+'" name="item_name[]">'+item_name+'</div></div></td><td><div class="form-group row"><div class="col-sm-12"><input class="hsn'+i+'" type="hidden" value="'+hsn+'" name="hsn[]">'+hsn+'</div></div></td><td><div class="form-group row"><div class="col-sm-12"><input type="hidden" class="mrp'+i+'" value="'+mrp+'" name="mrp[]">'+mrp+'</div></div></td><td><div class="form-group row"><div class="col-sm-12" id="unit_price"><input type="hidden" class="exclusive'+i+'" value="'+exclusive+'" name="exclusive[]">'+exclusive+'<input type="hidden" class="inclusive'+i+'" value="'+inclusive+'" name="inclusive[]"></div></div></td><td><div class="form-group row"><div class="col-sm-12"><input type="hidden" class="quantity'+i+'" value="'+quantity+'" name="quantity[]">'+quantity+'</div></div></td><td><div class="form-group row"><div class="col-sm-12"><input type="hidden" class="uom'+i+'" value="'+uom_id+'" name="uom[]">'+uom_name+'</div></div></td><td><div class="form-group row"><div class="col-sm-12"><input type="hidden" class="table_amount" id="amnt'+i+'" value="'+amount+'" name="amount[]">'+amount+'</div></div></td><td><div class="form-group row"><div class="col-sm-12"><input class="discount_val'+i+'" type="hidden" value="'+discount+'" name="discount[]">'+discount+'</div></div></td><td><div class="form-group row"><div class="col-sm-12"><input type="hidden" class="table_gst" id="tax'+i+'" value="'+gst+'" name="gst[]"><input type="hidden" class="tax_gst'+i+'"  value="'+tax_rate+'" name="tax_rate[]">'+gst+'</div></div></td><td><div class="form-group row"><div class="col-sm-12"><input type="hidden" class="table_net_price" id="net_price'+i+'" value="'+net_price+'" name="net_price[]">'+net_price+'</div></div></td><td style="background-color: #FAF860;"><div class="form-group row"><div class="col-sm-12"><input type="hidden" class="last_purchase" value="" name="last_purchase[]"></div></div></td><td><i class="fa fa-eye px-2 py-1 bg-info  text-white rounded show_items" id="'+i+'" aria-hidden="true"></i><i class="fa fa-pencil px-2 py-1 bg-success  text-white rounded edit_items" id="'+i+'" aria-hidden="true"></i><i class="fa fa-trash px-2 py-1 bg-danger  text-white rounded remove_items" id="'+i+'" aria-hidden="true"></i></td></tr>'

  $('.append_proof_details').append(items);
var length=$('#mytable tr:last').attr('class').split(' ')[0];

for(var m=0;m<length+1;m++)
{

  var invoice_num = $('#invoice'+m).val();
  
  for(var n=m+1;n<=length+1;n++)
  {
    
    if(typeof $('#invoice'+n).val() == 'undefined')
    {

    }
    else
    {
      var invoice_num1 = $('#invoice'+n).val();

      if(invoice_num == invoice_num1)
      {
        alert('Item S.No is Alredy Taken!');
        $('#row'+i).remove();
      }
      else
      {
        
      }
    }
  }
}

var total_net_price=calculate_total_net_price();
var total_amount=calculate_total_amount();
var total_gst=calculate_total_gst();
$("#total_price").val(total_net_price);
$(".total_net_value").text(total_net_price.toFixed(2));
$("#total_amount").val(total_amount);
$("#total_gst").val(total_gst.toFixed(2));
$("#igst").val(total_gst.toFixed(2));
var half_gst = parseFloat(total_gst)/2;
$("#cgst").val(half_gst.toFixed(2));
$("#sgst").val(half_gst.toFixed(2));

var to_html_total_net = total_net_price.toFixed(2);
var to_html_total_amount = total_amount.toFixed(2);
$(".total_net_price").html(parseFloat(to_html_total_net));
$(".total_amount").html(parseFloat(to_html_total_amount));


var discount_val = $('#discount').val();

var discount_total = $('#total_discount').val();
if(discount_val == '')
{
  var discount_val = 0;
}
var discount_total = parseInt(discount_total)+parseInt(discount_val);

$('#disc_total').val(discount_total);
$('#total_discount').val(discount_total);


$("#round_off").val(Math.round(total_net_price));

var len=$('.tables').length;
$('#counts').val(len);
i++;

// var array=[invoice_no,voucher_date,items_codes,item_code,item_name,mrp,hsn,quantity,tax_rate,gst,exclusive,uom_id,uom_name,inclusive,amount,discount,discount_percentage,net_price];

// var array_new=[voucher_date,receipt_note_no,supplier_invoice_no,supplier_invoice_date,
//               supplier_details,order_details,transport_details,remarks,supplier_invoice_value];

$.ajax({
           type: "GET",
            url: "{{ url('purchase/get_items/{id}') }}",
            data: { id: len },
           success: function(data) {
             // console.log(data);
             $('#items_codes').children('option:not(:first)').remove();
             for (var k=0; k < data.length; k++)
            {
             name =data[k].name;
             code =data[k].code;
             id =data[k].id;
              names = name.replace('','');
              codes = code.replace('','');
              
              var div_data="<option value="+id+">"+codes+"</option>";
                
                $(div_data).appendTo('#items_codes');

            }
           }
           
        });

// $.ajax({
//            type: "POST",
//             url: "{{ url('purchase/storedata/') }}",
//             data: { array: array, array_new: array_new },
//            success: function(data) {
//              // console.log(data);
             
//            }
//         });

$('#cat').hide();
$('.item_sno').val('');
$('.items_codes').val('');
$('.item_name').val('');
$('.mrp').val('');
$('.hsn').val('');
$('.quantity').val('');
$('.tax_rate').val('');
$('#exclusive').val('');
$('#inclusive').val('');
$('.amount').val('');
$('#discount').val('');
$('.discount_percentage').val('');
$('.net_price').val('');
$('.gst').val('');
$('.item_code').val('');
}
} 
$(document).on("click",".add_items",function(){
    add_items();
    bank_details_sno();

  });

$(document).on("click",".remove_items",function(){
  

       var button_id = $(this).attr("id");
       var invoice_no=$('.invoice_no'+button_id).val();
       var discount_val = $('.discount_val'+button_id).val();
       var lastDigit = String(discount_val).substr(-1);
       if(lastDigit != '%')
       {
        var discount_total = $('#total_discount').val();
    
        var discount_total = parseInt(discount_total)-parseInt(discount_val);

        $('#disc_total').val(discount_total);
        $('#total_discount').val(discount_total);
       }

       $('#row'+button_id).remove();

       
       var counts = $('#counts').val();
       $('#counts').val(counts-1); 
       bank_details_sno();
       //--i;

       
        
        

    var total_net_price=calculate_total_net_price();
    var to_html_total_net = total_net_price.toFixed(2);

    $(".total_net_price").html(parseFloat(to_html_total_net));

    var total_amount=calculate_total_amount();
    var to_html_total_amount = total_amount.toFixed(2);
    $(".total_amount").html(parseFloat(to_html_total_amount));
    $(".total_net_value").text(to_html_total_net);
    var total_gst=calculate_total_gst();

    $("#total_price").val(total_net_price);
    $("#total_amount").val(total_amount);
    $("#total_gst").val(total_gst);
    $("#igst").val(total_gst);
    var half_gst = parseFloat(total_gst)/2;
    $("#cgst").val(half_gst);
    $("#sgst").val(half_gst);

    $("#round_off").val(Math.round(total_net_price));

    $.ajax({
           type: "POST",
            url: "{{ url('purchase/remove_data/') }}",
            data: { invoice_no: invoice_no, gatepass_no: gatepass_no },
           success: function(data) {
             // console.log(data);
             
           }
        });


  
});

// $(document).on("click",".edit_items",function(){
//   $('.update_items').show();
//   $('.add_items').hide();
//   var id = $(this).attr("id");
//   var invoice_no = $('.invoice_no'+id).val(); var item_code_id = $('.item_code'+id).val();
//   var item_code_name = $('.items'+id).text(); var item_name = $('.item_name'+id).val();
//   var hsn = $('.hsn'+id).val(); var mrp = $('.mrp'+id).val();
//   var discount_val = $('.discount_val'+id).val(); var exclusive = $('.exclusive'+id).val();
//   var inclusive = $('.inclusive'+id).val(); var quantity = $('.quantity'+id).val();
//   var uom = $('.uom'+id).val(); var amnt = $('#amnt'+id).val();
//   var tax = $('#tax'+id).val(); var tax = $('.tax-gst'+id).val();
//   var net_price = $('.net_price'+id).val(); $('.exclusive_rate').val(exclusive);
//   $('.inclusive_rate').val(inclusive);$('.item_sno').val(invoice_no);
//   $('.items_codes').val(item_code_id);$('.item_name').val(item_name);
//   $('.item_code').val(item_code_name);$('.mrp').val(mrp);$('.hsn').val(hsn);
//   $('.quantity').val(quantity);$('.tax_rate').val(tax_gst);
//   $('.amount').val(amnt);$('.net_price').val(net_price);
//   $('.gst').val(tax);$('.uom').val(uom);
//   var lastDigit = String(discount_val).substr(-1); if(lastDigit == '%'){
//   var discount = parseInt(discount_val); $('.discount_percentage').val(discount);
//   $('.discount').val('');}else{$('.discount_rs').val(discount_val);$('.discount_percentage').val(''); }

// });

function expense_add()
{
  
  var expense_details='<div class="row col-md-12 expense"><div class="col-md-2"><label style="font-family: Times new roman;">Expense Type</label><select class="js-example-basic-multiple form-control" required="" id="expense_type" name="expense_type[]" ><option value="">Choose Expense Type</option>@foreach($expense_type as $expense_types)<option value="{{ $expense_types->id}}">{{ $expense_types->name}}</option>@endforeach</select></div><div class="col-md-2"><label style="font-family: Times new roman;">Expense Amount</label><input type="text" class="form-control expense_amount" id="expense_amount"  placeholder="Expense Amount" name="expense_amount[]" pattern="[0-9]{0,100}" title="Numbers Only" value=""></div><div class="col-md-2"><label><font color="white" style="font-family: Times new roman;">Add Expense</font></label><br><input type="button" class="btn btn-success" value="+" onclick="expense_add()" name="" id="add_expense">&nbsp;<input type="button" class="btn btn-danger remove_expense" value="-" name="" id="remove_expense"></div></div>'

  $('.append_expense').append(expense_details);
  var length=$('.expense').length;
$('#expense_count').val(length);
}

$(document).on("click",".remove_expense",function(){

  if($(".remove_expense").length > 1){
    $(this).closest('.expense').remove();
    var expense_count = $('#expense_count').val();
       $('#expense_count').val(expense_count-1);
  }
  else{
    alert("Atleast One row present");
  }

  });

function bank_details_sno(){
  $(".bank_s_no").each(function(key,index){
      $(this).html((key+1));
    });
}


  $("form").submit(function(e){
  if($('#total_price').val() == 0 || $('#total_price').val() == '')
  {
    alert('There Is No Row To Submit');
    e.preventDefault();
  }
  else
  {

  }    
    });

function calc_exclusive()
{
  
  var quantity = $('#quantity').val();
  var rate_exclusive = $('#exclusive').val();
  var rate_inclusive = $('#inclusive').val();
  var tax_rate = $('.tax_rate').val();
  

  if (quantity == '') 
  {
    alert('Please Enter Quantity First');
    $('#exclusive').val('');
    $('#inclusive').val('');
    $('#quantity').focus();
  }
  
  
      var total = parseInt(quantity)*parseFloat(rate_exclusive);
    
    $('#amount').val(total.toFixed(2));

    if(tax_rate == '')
    {
      $('#net_price').val(total.toFixed(2));
    }
    else
    {

      var rate = parseFloat(tax_rate)/100;
      var gst_rate = parseFloat(rate_exclusive)*parseFloat(rate);
      var gst_rate_inclusive = parseFloat(rate_exclusive)+parseFloat(gst_rate);

      $('#inclusive').val(gst_rate_inclusive);
      //alert(rate);
      var net_val = parseFloat(total)*parseFloat(rate);
      //alert(net_val);
      $('.gst').val(net_val.toFixed(2));

      var total_net_val = parseFloat(total)+parseFloat(net_val);
      $('#net_price').val(total_net_val.toFixed(2));

    }

    
  
}

function calc_inclusive()
{
  
  var quantity = $('#quantity').val();
  var rate_exclusive = $('#exclusive').val();
  var rate_inclusive = $('#inclusive').val();
  var tax_rate = $('.tax_rate').val();
  

  if (quantity == '') 
  {
    alert('Please Enter Quantity First');
    $('#exclusive').val('');
    $('#inclusive').val('');
    $('#quantity').focus();
  }
  
    //   var total = parseInt(quantity)*parseInt(rate_inclusive);
    
    // $('#amount').val(total.toFixed(2));

    if(tax_rate == '')
    {
      $('#net_price').val(total.toFixed(2));
    }
    else
    {

      var rate=parseFloat(tax_rate)/100;
      var gst_rate = parseFloat(rate_inclusive)*parseFloat(rate);
      var gst_rate_exclusive = parseFloat(rate_inclusive)-parseFloat(gst_rate);
      var total = parseInt(quantity)*parseFloat(gst_rate_exclusive);
      $('#amount').val(total.toFixed(2));
      $('#exclusive').val(gst_rate_exclusive);
      //alert(rate);
      var net_val = parseFloat(total)*parseFloat(rate);
      //alert(net_val);
      $('.gst').val(net_val.toFixed(2));

      var total_net_val = parseFloat(total)+parseFloat(net_val);
      $('#net_price').val(total_net_val.toFixed(2));

    }

    
  
}

function calc_tax()
{
  
  $("#exclusive").attr('readonly','readonly');
  $("#inclusive").removeAttr('readonly');
  $("#inclusive").focus();
  $("#exclusive").val('');
  $("#amount").val('');
  $("#net_price").val('');
  $("#discount").val('');
  
}

function calc_tax1()
{
  
  
  $("#exclusive").removeAttr('readonly');
  $("#inclusive").attr('readonly','readonly');
  $("#exclusive").focus();
  $("#inclusive").val('');
  $("#amount").val('');
  $("#net_price").val('');
  $("#discount").val('');
}

function discount_calc()
{
  var discount = $("#discount").val();
  var discount_percentage = $(".discount_percentage").val();
  //alert(discount_percentage);
  var amount = $("#amount").val();
  var quantity = $("#quantity").val();
  var exclusive = $("#exclusive").val();
  var inclusive = $("#inclusive").val();
  var tax_rate = $("#tax_rate").val();
 
  if(amount == '' || quantity == '' || exclusive == '' && inclusive == '')
  {
    alert('There is no amount to Discount');
    $("#quantity").val('');
    $("#exclusive").val('');
    $("#inclusive").val('');
    $("#amount").val('');
    $(".discount_percentage").val('');
    $("#discount").val('');
    $(".gst").val('');

  }

  // else if(discount_percentage != '')
  // {
    
  // }

    
  var disc_amount_exclusive = parseFloat(exclusive)-parseFloat(discount);
  var disc_amount_inclusive = parseFloat(inclusive)-parseFloat(discount);

  $("#exclusive").val(disc_amount_exclusive);
  $("#inclusive").val(disc_amount_inclusive);

  calc_exclusive();
  var amount = $(".amount").val();

  var rate=parseFloat(tax_rate)/100;
      //alert(rate);
      var net_val = parseFloat(amount)*parseFloat(rate);
      //alert(net_val);
      $('.gst').val(net_val.toFixed(2));

      var total_net_val = parseFloat(amount)+parseFloat(net_val);
      $('#net_price').val(total_net_val.toFixed(2));

  
    // var discount_total = $('#disc_total').val();
    
    // var discount_total = parseInt(discount_total)+parseInt(discount);

    // $('#disc_total').val(discount_total);
    // $('#total_discount').val(discount_total);
  
}

function discount_calc1()
{
  var discount = $("#discount").val();
  var discount_percentage = $(".discount_percentage").val();
  var amount = $("#amount").val();
  var quantity = $("#quantity").val();
  var exclusive = $("#exclusive").val();
  var inclusive = $("#inclusive").val();
  var tax_rate = $("#tax_rate").val();
 
  if(amount == '' || quantity == '' || exclusive == '' && inclusive == '')
  {
    alert('There is no amount to Discount');
    $("#quantity").val('');
    $("#exclusive").val('');
    $("#inclusive").val('');
    $("#amount").val('');
    $(".discount_percentage").val('');
    $("#discount").val('');
    $(".gst").val('');
  }

  

  var disc_rate = parseFloat(discount_percentage)/100;
  var disc_val_exclusive = parseFloat(exclusive)*parseFloat(disc_rate);
  var disc_val_inclusive = parseFloat(inclusive)*parseFloat(disc_rate);
  
  var disc_amount_exclusive = parseFloat(exclusive)-parseFloat(disc_val_exclusive);
  var disc_amount_inclusive = parseFloat(inclusive)-parseFloat(disc_val_inclusive);

  $("#exclusive").val(disc_amount_exclusive);
  $("#inclusive").val(disc_amount_inclusive);
  calc_exclusive();
  var amount = $(".amount").val();
  //alert(disc_amount);

  var rate=parseFloat(tax_rate)/100;
      //alert(rate);
      var net_val = parseFloat(amount)*parseFloat(rate);
      //alert(net_val);
      $('.gst').val(net_val.toFixed(2));

      var total_net_val = parseFloat(amount)+parseFloat(net_val);
      $('#net_price').val(total_net_val.toFixed(2));

  
    //$(".net_price").val((parseFloat(amount)-parseFloat(discount)).toFixed(2));
  
  
  
}

function item_codes()
{

var item_code=$('#codes').val();
//alert(item_code);
var row_id=$('#last').val();

      $.ajax({  
        
        type: "GET",
        url: "{{ url('estimation/getdata/{id}') }}",
        data: { id: item_code },             
                        
        success: function(data){ 
          //alert(data);
             
             id = data[0].item_id;
             name =data[0].item_name;
             code =data[0].code;
             mrp =data[0].mrp;
             hsn =data[0].hsn;
             uom_id =data[0].uom_id;
             uom_name =data[0].uom_name;
             igst =data[1].igst;
              
              //var gst = igst/100;

              //alert(gst);
                       
             $('#item_code').val(code);
             $('#items_codes').val(id);
            $('#item_name').val(name);
             $('#mrp').val(mrp);
             $('#hsn').val(hsn);
             $('#uom').val(uom_id);
              $('#uom_name').val(uom_name);
             $('#tax_rate').val(igst);
             $(".cat").dialog('close');
             $('#quantity').focus();
             //$('#cat').hide();
        }

    });

}

function get_details()
{

  var item_code=$('#item_code').val();
//alert(item_code);
var row_id=$('#last').val();

      $.ajax({  
        
        type: "GET",
        url: "{{ url('estimation/getdata_item/{id}') }}",
        data: { id: item_code },             
                        
        success: function(data){ 
          //alert(data);
             
             id = data[0].item_id;
             name =data[0].item_name;
             code =data[0].code;
             mrp =data[0].mrp;
             hsn =data[0].hsn;
             uom_id =data[0].uom_id;
             uom_name =data[0].uom_name;
             igst =data[1].igst;
              
              //var gst = igst/100;

              //alert(gst);
                       
             $('#item_code').val(code);
             $('#items_codes').val(id);
            $('#item_name').val(name);
             $('#mrp').val(mrp);
             $('#hsn').val(hsn);
              $('#uom').val(uom_id);
              $('#uom_name').val(uom_name);
             $('#tax_rate').val(igst);
             $('#quantity').focus();
             $('#cat').hide();
        }

    });

}


function find_cat()
{
  
  $('#cat').show();
  //$('#code').dialog();
  $('#cat').dialog();
  $('.categories').focus();

}

function categories_check()
{
  var  categories=$('#categories').val();
  $.ajax({  
        
        type: "GET",
        url: "{{ url('purchase/change_items/{id}') }}",
        data: { id: categories },             
             
        success: function(data){ 
         
        $('#codes').children('option:not(:first)').remove();                  
            for (var i=0; i < data.length; i++)
            {
             name =data[i].name;
             code =data[i].code;
             id=data[i].id;
              names = name.replace('','');
              codes = code.replace('','');
              
              var div_data="<option value="+id+">"+codes+"</option>";
                
                $(div_data).appendTo('#codes');

            }
            //$(".cat").dialog('close');
            $("#items_codes").focus();
        }


    });
}

function code_check()
{
  
  item_codes();
  
}

function supplier_details()
{

  var supplier_id=$('.supplier_id').val();


  $.ajax({
           type: "POST",
            url: "{{ url('estimation/address_details/') }}",
            data: { supplier_id : supplier_id },
           success: function(data) {

            console.log(data);
            $('#address_line_1').val(data);
            // $('#address_line_2').val(data[1]);
            // $('#city_id').val(data[2]);
            // $('#district_id').val(data[3]);
            // $('#state_id').val(data[4]);
            // $('#postal_code').val(data[5]);
           $('.address').text(data);
           }
        });
}

// function round_of()
// {
  
//   if($('#total_price').val() == 0)
//   {
//     alert('There is no amount to Round Off!');
//     $('.round_off').val('');
//   }
//   else
//   {
//     var round_off = $('.round_off').val();
//  //var num = round_off.toString().substr(-2);
//  var value = parseInt(round_off);
//  alert(value);

//  var first_symbol = String(round_off)[0];
//  //alert(first_symbol);
 
//   if(first_symbol == '+')
//   {
//     var total_price = $('#total_price').val();
//     var total = parseFloat(total_price)+parseFloat(value);
//     $('#total_price').val(total);
//     $('.total_net_value').text(total);
    
//   }
//   else if(first_symbol == '-')
//   {
//     var total_price = $('#total_price').val();
//     var total = parseFloat(total_price) + parseInt(value);
//     //alert(total);
//     $('#total_price').val(total);
//     $('.total_net_value').text(total);
//   }
//   }
 
  
// }


</script>
<script type="text/javascript">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" rel="stylesheet"/>
<script src="jquery.ui.position.js"></script>
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
