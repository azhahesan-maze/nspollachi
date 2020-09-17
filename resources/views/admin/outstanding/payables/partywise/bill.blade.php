@extends('admin.layout.app')
@section('content')
<div class="col-12 body-sec">
  <div class="card px-0">
    <!-- card header start@ -->
    <div class="card-header px-2">
      <div class="row">
        <div class="col-4">
          <h3>Party Wise(Payables)</h3>
        </div>
        <div class="col-8 mr-auto">
          <ul class="h-right-btn mb-0 pl-0">
            <li><button type="button" class="btn btn-success"><a href="{{route('payable_partywise.index')}}">Back</a></button></li>
          </ul>
        </div>
      </div>
    </div>
    <!-- card header end@ -->

    <style>
table, th, td {
  border: 1px solid #E1E1E1;
}
</style>
    <div class="card-body">
    
      <form  method="post" class="form-horizontal needs-validation" novalidate action="{{route('payable_partywise.store')}}" enctype="multipart/form-data">
      {{csrf_field()}}


      <div class="col-md-12 row">

            <div class="col-md-2">
            <input type="button" class="btn btn-success" name="ageing" id="ageing" onclick="ageing_analysis()" value="Ageing Analysis">
            </div>

            
            <div class="col-md-2 analysis1" style="display: none;">
              <div style="background-color: #E5E8E8;">
              <label>0-30 Days</label>
              <input type="checkbox" name="from1" value="0" onclick="from0()" id="from1"><br>
              <label>31-60 Days</label>
              <input type="checkbox" name="from1" value="0" onclick="from30()" id="from2"><br>
              <label>61-90 Days</label>
              <input type="checkbox" name="from1" value="0" onclick="from60()" id="from3"><br>
              <label>91-120 Days</label>
              <input type="checkbox" name="from1" value="0" onclick="from90()" id="from4"><br>
              <label> >120 Days</label>
              <input type="checkbox" name="from1" value="0" onclick="from120()" id="from5"><br>
              </div>
              <br>
              <!-- <input type="Number" readonly="" class="form-control" name="from2" value="31" id="from2"><br>
              <input type="Number" readonly="" class="form-control" name="from3" value="61" id="from3"><br>
              <input type="Number" readonly="" class="form-control" name="from4" value="91" id="from4"><br>
              <input type="Number" readonly="" class="form-control" name="from5" value="121" id="from5"><br> -->
              
            </div>

            <!-- <div class="col-md-1 analysis2" style="display: none;">
              <label>To</label>
              <input type="Number" class="form-control" name="to" id="to"><br>
              <input type="Number" class="form-control" name="to" id="to"><br>
              <input type="Number" class="form-control" name="to" id="to"><br>
              <input type="Number" class="form-control" name="to" id="to"><br>
              <input type="Number" class="form-control" name="to" id="to"><br>
            </div> -->

            
          </div>
          <br>

      <div class="col-md-12 row">


        <div class="col-md-3">
          <label style="font-family: Times new roman; color: white;">Choose</label><br>
          <label style="font-family: Times new roman;">All</label>&nbsp;&nbsp;
          <input type="radio" name="choose" checked="" value="1">&nbsp;&nbsp;
          <label style="font-family: Times new roman;">Single</label>&nbsp;&nbsp;
          <input type="radio" name="choose" value="0">
          
        </div>

        <div class="col-md-4">
                  <label style="font-family: Times new roman;">Party Name</label><br>
                  <div class="form-group row">
                     <div class="col-sm-8">
                      <select class="js-example-basic-multiple col-12 form-control custom-select supplier_id" name="supplier_id" id="supplier_id">
                           <option value="">Choose Party Name</option>
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
        
      </div>

      <div class="col-md-12 form-row mb-3">
            <div class="col-md-2">
              <label>From</label>
            <input type="date" class="form-control from" name="from" id="from">
            </div>

            <div class="col-md-2">
              <label>To</label>
            <input type="date" class="form-control to" name="to" id="to">
            </div>

              <div class="col-sm-2">
                <label>Nature </label>
                <select class="js-example-basic-multiple col-12 form-control custom-select nature"  name="nature" id="nature">
                  <option value="">Choose Nature</option>
                        </select>
              </div>
              <div class="col-md-2">
              <label>Head</label>
            <input type="text" class="form-control head" placeholder="Head" name="head" id="head">
            </div>
            <div class="col-md-2">
              <label>Amount</label>
            <input type="Number" class="form-control amount" placeholder="Amont" name="amount" id="amount">
            </div>
            <div class="col-sm-2">
                <label>Choose Any One</label>
                <select class="js-example-basic-multiple col-12 form-control custom-select nature"  name="nature" id="nature">
                  <option value="">Choose Any One</option>
                           <option value="">Greater Than</option>
                           <option value="">Less Than</option>
                           <option value="">Equal To</option>
                        </select>
              </div>
          </div>

        <div class="form-row">
          
          <table class="table" id="team-list">
                  <thead>
                    <th> S.no </th>
                    <th> Bill.no </th>
                    <th> Bill Date</th>
                    <th> Party Name</th>
                    <th> Bill Amount</th>
                    <th> Cleared Amount</th>
                    <th> Pending Amount</th>
                    <th id="0-30" style="display: none;">0-30 Days</th>
                    <th id="31-60" style="display: none;">31-60 Days</th>
                    <th id="61-90" style="display: none;">61-90 Days</th>
                    <th id="91-120" style="display: none;">91-120 Days</th>
                    <th id="120" style="display: none;">(>120 Days)</th>
                    <th> No Of Days From Bill Date</th>
                    <th> No Of Days From Due Date</th>
                    <th> Sales Man Name</th>
                    <th> Supplier Contact Name</th>
                    <th> Supplier Contact Number</th>
                    <th> Supplier Contact Email Id</th>
                    
                  </thead>
                  <tbody>

                  </tbody>
                  
                </table>
          
        </div>
        <!-- <div class="col-md-7 text-right">
          <button class="btn btn-success" name="add" type="submit">Submit</button>
        </div> -->
      </form>
    </div>
    <script src="{{asset('assets/js/master/capitalize.js')}}"></script>
    <script>

      $(document).on("click",".refresh_supplier_id",function(){
      var supplier_dets=refresh_supplier_master_details();
      $(".supplier_id").html(supplier_dets);
      });

      function ageing_analysis() 
      {
        $('.analysis1').show();
        $('.analysis2').show();
        $('#0-30').show();
        $('#31-60').show();
        $('#61-90').show();
        $('#90-120').show();
        $('#120').show();
      }

      function from0()
      {
        
      }
      function from30()
      {
        $('#from1').attr('checked','checked');
      }
      function from60()
      {
        $('#from1').attr('checked','checked');
        $('#from2').attr('checked','checked');
      }
      function from90()
      {
        $('#from1').attr('checked','checked');
        $('#from2').attr('checked','checked');
        $('#from3').attr('checked','checked');
      }
      function from120()
      {
        $('#from1').attr('checked','checked');
        $('#from2').attr('checked','checked');
        $('#from3').attr('checked','checked');
        $('#from4').attr('checked','checked');
      }

    </script>
    <!-- card body end@ -->
  </div>
</div>
@endsection

