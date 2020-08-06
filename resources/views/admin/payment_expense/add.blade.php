@extends('admin.layout.app')
@section('content')
<div class="col-12 body-sec">
  <div class="card container px-0">
    <!-- card header start@ -->
    <div class="card-header px-2">
      <div class="row">
        <div class="col-4">
          <h3>Payment Of Expense</h3>
        </div>
        <div class="col-8 mr-auto">
          <ul class="h-right-btn mb-0 pl-0">
            <li><button type="button" class="btn btn-success"><a href="">Back</a></button></li>
          </ul>
        </div>
      </div>
    </div>
    <!-- card header end@ -->
    <div class="card-body">
    
      <form  method="post" class="form-horizontal needs-validation" novalidate action="{{route('payment_request.store')}}" enctype="multipart/form-data">
      {{csrf_field()}}

        <div class="form-row">
          <div class="col-md-6">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Direct Head:</label>
              <div class="col-sm-2">
                <input type="radio" class="request_no" placeholder="Request No" name="request_no" value="1" checked="" onclick="direct_head()">
                
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Against Bill:</label>
              <div class="col-sm-2">
                <input type="radio" class="request_no" placeholder="Request No" onclick="against_bill()" name="request_no" value="0">
                
              </div>
            </div>
          </div>
        </div>
        <div class="form-row">
          <div class="col-md-6">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Voucher No :</label>
              <div class="col-sm-8">
                <input type="text" class="form-control voucher_no" placeholder="Voucher No" value="" name="voucher_no" >
                
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Voucher Date :</label>
              <div class="col-sm-8">
                <input type="date" class="form-control date" placeholder="Date" value="{{ $date }}" name="date" >
                
              </div>
            </div>
          </div>
        </div>

        <div id="against_bill" style="display: none;">
        <div class="form-row" >
          <div class="col-md-6">
                  <div class="form-group row">
                    <label for="validationCustom01" class="col-sm-4 col-form-label">Party Name :</label>
                     <div class="col-sm-6">
                      <select class="js-example-basic-multiple col-12 form-control custom-select supplier_id" name="supplier_id" id="supplier_id">
                           <option value="">Choose Supplier Name</option>
                           @foreach($supplier as $suppliers)
                           <option value="{{ $suppliers->id }}">{{ $suppliers->name }}</option>
                           @endforeach
                        </select>
                     </div>
                     <a href="{{ url('master/supplier/create')}}" target="_blank">
                     <button type="button"  class="px-2 btn btn-success ml-2" title="Add Supplier"><i class="fa fa-plus-circle" aria-hidden="true"></i></button></a>
                     <button type="button"  class="px-2 btn btn-success mx-2 refresh_supplier_id" title="Add Brand"><i class="fa fa-refresh" aria-hidden="true"></i></button>
                  </div>
               </div>

               <div class="col-md-8">
                       <div class="form-group row">
                       <div class="col-md-4">
                       <label for="validationCustom01" class=" col-form-label"><h4>Bill Details:</h4> </label><br>
                       
                           
                       </div>
                         </div>
              </div>

        <div class="card-body" style="height: 100%;">
      <table id="" class="table table-striped table-bordered" style="width:100%">
        <thead>
          <tr>
            <th>S.No</th>
            <th>Bill.No</th>
            <th>Bill Date </th>
            <th>Bill Amount </th>
            <th>Already Paid</th>
            <th>Pending Amount</th>
            <th>Current Cleared Amount</th>
          </tr>
        </thead>
        <tbody class="append_proof_details" id="myTable">
        </tbody>
        <tfoot>
              <th></th>
              <th>Total</th>
              <th></th>
              <th></th>
              <th></th>
              <th></th>
              <th></th>
            </tfoot>
      </table>
    </div>

             </div>
      <div class="form-row">
        <div class="col-md-6">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Mode : </label>
              <div class="col-sm-8">
                <select class="js-example-basic-multiple col-12 form-control custom-select against_bill_mode"  name="against_bill_mode" id="against_bill_mode">
                           <option value="">Choose Mode</option>
                           <option value="">Cash</option>
                           <option value="">Bank</option>
                        </select>
              </div>
            </div>
          </div>
        </div>

        <div class="card-body" style="height: 100%;">
      <table id="" class="table table-striped table-bordered" style="width:100%">
        <thead>
          <tr>
            <th>CH.No</th>
            <th>CH.Date </th>
            <th>CH.Amount </th>
            <th>UTR No.</th>
          </tr>
        </thead>
        <tbody class="append_proof_details" id="myTable">
        </tbody>
        <tfoot>
              <th></th>
              <th></th>
              <th></th>
              <th></th>
            </tfoot>
      </table>
    </div>

             </div>
          
      <div id="direct_head">
        <div class="form-row">
        <div class="col-md-6">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Nature Of Expense: </label>
              <div class="col-sm-8">
               <input type="text" name="nature" class="form-control" placeholder="Nature Of Expense" id="nature">
              </div>
            </div>
          </div>
        </div>
        <br>

        <div class="col-md-8">
                       <div class="form-group row">
                       <div class="col-md-4">
                       <label for="validationCustom01" class=" col-form-label"><h4>Bill Details:</h4> </label><br>
                       
                           
                       </div>
                         </div>
              </div>

        <div class="card-body" style="height: 100%;">
      <table id="" class="table table-striped table-bordered" style="width:100%">
        <thead>
          <tr>
            <th rowspan="2">S.No</th>
            <th rowspan="2">Bill.No</th>
            <th rowspan="2">Bill Date </th>
            <th rowspan="2">Bill Amount </th>
            <th align="center" colspan="3">GST</th>
            <th rowspan="2">Total</th>
          </tr>
          <tr>
            <th>CGST</th>
            <th>SGST</th>
            <th>IGST</th>
          </tr>
        </thead>
        <tbody class="append_proof_details" id="myTable">
        </tbody>
        <tfoot>
              
              <th></th>
              <th></th>
              <th></th>
              <th></th>
              <th></th>
              <th></th>
              <th></th>
              <th></th>
            </tfoot>
      </table>
    </div>

    <div class="form-row">
        <div class="col-md-6">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Mode : </label>
              <div class="col-sm-8">
                <select class="js-example-basic-multiple col-12 form-control custom-select direct_head_mode"  name="direct_head_mode" id="direct_head_mode">
                           <option value="">Choose Mode</option>
                           <option value="">Cash</option>
                           <option value="">Bank</option>
                        </select>
              </div>
            </div>
          </div>
        </div>

        <div class="card-body" style="height: 100%;">
      <table id="" class="table table-striped table-bordered" style="width:100%">
        <thead>
          <tr>
            <th>CH.No</th>
            <th>CH.Date </th>
            <th>CH.Amount </th>
            <th>UTR No.</th>
          </tr>
        </thead>
        <tbody class="append_proof_details" id="myTable">
        </tbody>
        <tfoot>
              <th></th>
              <th></th>
              <th></th>
              <th></th>
            </tfoot>
      </table>
    </div>

    </div>
    <div class="form-row">
        <div class="col-md-6">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label"> Remarks : </label>
              <div class="col-sm-8">
                <input type="text" class="form-control remark" placeholder="Remarks" name="remark" value="">
              </div>
            </div>
          </div>
        </div>
        <br>

        <div class="col-md-7 text-right">
          <button class="btn btn-success" name="add" disabled="" type="submit">Submit</button>
          <button class="btn btn-warning" name="add" disabled="" type="submit">Cancel</button>
        </div>
        <div class="col-md-7 text-right">
          
        </div>
      </form>
    </div>
    <script src="{{asset('assets/js/master/capitalize.js')}}"></script>
    <!-- card body end@ -->
  </div>
</div>

<script type="text/javascript">
  $(document).on("click",".refresh_supplier_id",function(){
      var supplier_dets=refresh_supplier_master_details();
      $(".supplier_id").html(supplier_dets);
   }); 
  function direct_head()
  {
    $('#direct_head').show();
    $('#against_bill').hide();
  }

  function against_bill()
  {
    $('#direct_head').hide();
    $('#against_bill').show();
  }
</script>

@endsection

