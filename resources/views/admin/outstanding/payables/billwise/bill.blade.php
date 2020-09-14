@extends('admin.layout.app')
@section('content')
<div class="col-12 body-sec">
  <div class="card px-0">
    <!-- card header start@ -->
    <div class="card-header px-2">
      <div class="row">
        <div class="col-4">
          <h3>Bill Wise(Payables)</h3>
        </div>
        <div class="col-8 mr-auto">
          <ul class="h-right-btn mb-0 pl-0">
            <li><button type="button" class="btn btn-success"><a href="{{route('payable_billwise.index')}}">Back</a></button></li>
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
    
      <form  method="post" class="form-horizontal needs-validation" novalidate action="{{route('payable_billwise.store')}}" enctype="multipart/form-data">
      {{csrf_field()}}

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
    <!-- card body end@ -->
  </div>
</div>
@endsection

