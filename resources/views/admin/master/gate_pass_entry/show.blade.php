@extends('admin.layout.app')
@section('content')
<div class="col-12 body-sec">
  <div class="card container px-0">
    <!-- card header start@ -->
    <div class="card-header px-2">
      <div class="row">
        <div class="col-4">
          <h3>Gate Pass Entry Update</h3>
        </div>
        <div class="col-8 mr-auto">
          <ul class="h-right-btn mb-0 pl-0">
            <li><button type="button" class="btn btn-success"><a href="{{ route('gate_pass_entry.index') }}">Back</a></button></li>
          </ul>
        </div>
      </div>
    </div>
    <!-- card header end@ -->
    <div class="card-body">
    
      <form  method="post" class="form-horizontal needs-validation" action="{{ route('gate_pass_entry.update',$gatepass->pass_id) }}" enctype="multipart/form-data">
      {{csrf_field()}}
      @method('PATCH')


     
        <div class="form-row">
         

         <!--  <div class="col-md-8">
          <h4>Professional details:</h4>
          </div> -->
          <div class="col-md-6">
            
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Gate Pass No</label>
              <div class="col-sm-8">
            <div class="input-group">
            
                     <input type="text" class="form-control" readonly placeholder="Gate Pass No" name="num" value="{{ $gatepass->gate_pass_no }}">
                
            
          </div>
          
          </div>
          </div>

          </div>

          <div class="col-md-6">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Date </label>
              <div class="col-sm-8">
                <input type="date" class="form-control"  placeholder="Date"  name="date" value="{{ $gatepass->date }}" >
                
                
              </div>
            </div>
          </div>

 </div>

 <div class="form-row">
         

         <!--  <div class="col-md-8">
          <h4>Professional details:</h4>
          </div> -->
          <div class="col-md-6">
            
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Supplier Name</label>

              <div class="col-sm-8">
                        <select class="js-example-basic-multiple col-12 form-control custom-select branch_id required_for_valid" name="supplier_name">
                          <option value="{{ $gatepass->suppliers_id }}">{{ $gatepass->name }}</option>
                          @foreach($suppliers as $value)
                          <option value="{{ $value->id }}">{{ $value->name }}</option>
                          @endforeach
                        </select>
                      </div>


              <!-- <div class="col-sm-8">
            <div class="input-group">

              <select class="form-control" name="supplier_name" required="">
                <option value="{{ $gatepass->suppliers_id }}">{{ $gatepass->name }}</option>
                @foreach($suppliers as $value)
                <option value="{{ $value->id }}">{{ $value->name }}</option>
                @endforeach
              </select>
            
                     
            
          </div>
          
          </div> -->
          </div>

          </div>

          <div class="col-md-6">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Type</label>
              <div class="col-sm-8">
                <input type="hidden" name="value" value="{{ $type_value }}">
                @if($gatepass->type == 1)
               <input type="radio" name="type" checked="" value="1" onchange="invoice()">
               <label for="validationCustom01" class="col-sm-4 col-form-label">Invoice</label>
               <input type="radio" name="type"  value="0" onchange="delivery()">
                <label for="validationCustom01" class="col-sm-4 col-form-label">Delivery note</label>
               @else
               <input type="radio" name="type" value="1" onchange="invoice()">
               <label for="validationCustom01" class="col-sm-4 col-form-label">Invoice</label>
                <input type="radio" name="type"  value="0" checked="" onchange="delivery()">
                <label for="validationCustom01" class="col-sm-4 col-form-label">Delivery note</label>
                @endif
              </div>
            </div>
          </div>

 </div>

 <div class="form-row">
         

         <!--  <div class="col-md-8">
          <h4>Professional details:</h4>
          </div> -->
          <div class="col-md-6">
            @if($gatepass->type == 1)
            <div class="form-group row" id="invoice_number">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Supplier Invoice No</label>
              <div class="col-sm-8">
            <div class="input-group">
            
                     <input type="text" class="form-control"  placeholder="Supplier Invoice No" name="supplier_invoice_number"  value="{{ $gatepass->supplier_invoice_number }}">
                
          </div>
          
          </div>
          </div>

          <div class="form-group row"  style="display: none;" id="delivery_number">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Supplier Delivery No</label>
              <div class="col-sm-8">
            <div class="input-group">
            
                     <input type="text" class="form-control"  placeholder="Supplier Delivery No" name="supplier_delivery_number"  value="{{ $gatepass->supplier_delivery_number }}">
                
          </div>
          
          </div>
          </div>
          @else

          <div class="form-group row" id="delivery_number">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Supplier Delivery No</label>
              <div class="col-sm-8">
            <div class="input-group">
            
                     <input type="text" class="form-control"  placeholder="Supplier Delivery No" name="supplier_delivery_number"  value="{{ $gatepass->supplier_delivery_number }}">
                
          </div>
          
          </div>
          </div>

<div class="form-group row" style="display: none;" id="invoice_number">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Supplier Invoice No</label>
              <div class="col-sm-8">
            <div class="input-group">
            
                     <input type="text" class="form-control"  placeholder="Supplier Invoice No" name="supplier_invoice_number"  value="{{ $gatepass->supplier_invoice_number }}">
                
          </div>
          
          </div>
          </div>

          @endif

          </div>

          <div class="col-md-6">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Taxable Value </label>
              <div class="col-sm-8">
                <input type="text" class="form-control"   placeholder="Taxable Value" name="taxable_value" pattern="[0-9][0-9 . 0-9]{0,100}" title="Numbers Only" value="{{ $gatepass->taxable_value }}">
               
                
              </div>
            </div>
          </div>

 </div>

 <div class="form-row">
         

         <!--  <div class="col-md-8">
          <h4>Professional details:</h4>
          </div> -->
          <div class="col-md-6">
            
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Tax Value</label>
              <div class="col-sm-8">
            <div class="input-group">
            
                     <input type="text" class="form-control"  placeholder="Tax Value" name="tax_value"  pattern="[0-9][0-9 . 0-9]{0,100}" title="Numbers Only" value="{{ $gatepass->tax_value }}">
                
          </div>
          
          </div>
          </div>

          </div>

          <div class="col-md-6">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Total Invoice Value </label>
              <div class="col-sm-8">
                <input type="text" class="form-control"  placeholder="Total invoice Value" name="total_invoice_value"  pattern="[0-9][0-9 . 0-9]{0,100}" title="Numbers Only" value="{{ $gatepass->total_invoice_value }}">
               
                
              </div>
            </div>
          </div>

 </div>

         <div>
          <h6>Weight Info*</h6>
          </div>

          
         <div class="form-row">
         

         <!--  <div class="col-md-8">
          <h4>Professional details:</h4>
          </div> -->
          <div class="col-md-6">
            
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Load Bill</label>
              <div class="col-sm-8">
            <div class="input-group">
            
                     <input type="text" class="form-control"  placeholder="Load Bill" name="load_bill" pattern="[0-9][0-9 . 0-9]{0,100}" title="Numbers Only" value="{{ $gatepass->load_bill }}">
                
          </div>
          
          </div>
          </div>

          </div>

          <div class="col-md-6">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Load Live </label>
              <div class="col-sm-8">
                <input type="text" class="form-control"  placeholder="Load Live" name="load_live"  pattern="[0-9][0-9 . 0-9]{0,100}" title="Numbers Only" value="{{ $gatepass->load_live }}">
               
                
              </div>
            </div>
          </div>

 </div> 

 <div class="form-row">
         

         <!--  <div class="col-md-8">
          <h4>Professional details:</h4>
          </div> -->
          <div class="col-md-6">
            
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Unload Bill</label>
              <div class="col-sm-8">
            <div class="input-group">
            
                     <input type="text" class="form-control"  placeholder="Unload Bill" name="unload_bill" pattern="[0-9][0-9 . 0-9]{0,100}" title="Numbers Only" value="{{ $gatepass->unload_bill }}">
                
          </div>
          
          </div>
          </div>

          </div>

          <div class="col-md-6">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Unload Live </label>
              <div class="col-sm-8">
                <input type="text" class="form-control"  placeholder="Unload Live" name="unload_live" pattern="[0-9][0-9 . 0-9]{0,100}" title="Numbers Only" value="{{ $gatepass->unload_live }}">
               
                
              </div>
            </div>
          </div>

 </div> 
          
        <div class="col-md-7 text-right">
          <input type="submit" class="btn btn-success" name="update" value="Update">
           
        </div>
      </form>
    </div>
    <!-- card body end@ -->
  </div>
</div>

@endsection

<script>
function delivery()
{
  
  $('#invoice_number').hide();
  $('#delivery_number').show();
}

function invoice()
{
  $('#invoice_number').show();
  $('#delivery_number').hide();
}
</script>