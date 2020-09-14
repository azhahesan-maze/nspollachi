@extends('admin.layout.app')
@section('content')
<div class="col-12 body-sec">
  <div class="card px-0">
    <!-- card header start@ -->
    <div class="card-header px-2">
      <div class="row">
        <div class="col-4">
          <h3>Party Wise(Receivables)</h3>
        </div>
        <div class="col-8 mr-auto">
          <ul class="h-right-btn mb-0 pl-0">
            <li><button type="button" class="btn btn-success"><a href="{{route('receivable_partywise.index')}}">Back</a></button></li>
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
    
      <form  method="post" class="form-horizontal needs-validation" novalidate action="{{route('receivable_partywise.store')}}" enctype="multipart/form-data">
      {{csrf_field()}}

      <div class="col-md-12 row">


        <div class="col-md-3">
          <label style="font-family: Times new roman;">Choose Any</label><br>
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
                    <th> No Of Days From Bill Date</th>
                    <th> No Of Days From Due Date</th>
                    <th> Sales Man Name</th>
                    <th> Customer Contact Name</th>
                    <th> Customer Contact Number</th>
                    <th> Customer Contact Email Id</th>
                    
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

    </script>
    <!-- card body end@ -->
  </div>
</div>
@endsection

