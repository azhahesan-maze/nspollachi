@extends('admin.layout.app')
@section('content')
<div class="col-12 body-sec">
  <div class="card px-0">
    <!-- card header start@ -->
    <div class="card-header px-2">
      <div class="row">
        <div class="col-4">
          <h3>Day Book</h3>
        </div>
        <div class="col-8 mr-auto">
          <ul class="h-right-btn mb-0 pl-0">
            <li><button type="button" class="btn btn-success"><a href="{{route('daybook.index')}}">Back</a></button></li>
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
    
      <form  method="post" class="form-horizontal needs-validation" novalidate action="{{route('daybook.store')}}" enctype="multipart/form-data">
      {{csrf_field()}}

        <div class="form-row">


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
          
          <table class="table" id="team-list">
                  <thead>
                    <th> S.no </th>
                    <th> Date </th>
                    <th> Particulars</th>
                    <th> Nature</th>
                    <th> Debit Amount</th>
                    <th> Credit Amount</th>
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

