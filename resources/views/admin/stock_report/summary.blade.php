@extends('admin.layout.app')
@section('content')
<div class="col-12 body-sec">
  <div class="card px-0">
    <!-- card header start@ -->
    <div class="card-header px-2">
      <div class="row">
        <div class="col-4">
          <h3>Stock Summary</h3>
        </div>
        <div class="col-8 mr-auto">
          <ul class="h-right-btn mb-0 pl-0">
            <li><button type="button" class="btn btn-success"><a href="{{route('stock_summary.index')}}">Back</a></button></li>
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

          <div class="col-md-12 row">

            <div class="col-md-2">
            <input type="button" class="btn btn-success" name="ageing" id="ageing" onclick="ageing_analysis()" value="Ageing Analysis">
            </div>
            
            <div class="col-md-1 analysis1" style="display: none;">
              <!-- <div style="background-color: #E5E8E8;">
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
              <br> -->
              <label>From</label>
              <input type="Number" class="form-control" oninput="from_value1()" style="display: none;" name="from1" value="0" id="from1"><br>
              <input type="Number" class="form-control" oninput="from_value2()" style="display: none;" name="from2" value="0" id="from2"><br>
              <input type="Number" class="form-control" oninput="from_value3()" style="display: none;" name="from3" value="0" id="from3"><br>
              <input type="Number" class="form-control" oninput="from_value4()" style="display: none;" name="from4" value="0" id="from4"><br>
              <input type="Number" class="form-control" oninput="from_value5()" style="display: none;" name="from5" value="0" id="from5"><br>
              
            </div>

            <div class="col-md-1 analysis2" style="display: none;">
              <label>To</label>
              <input type="Number" class="form-control" onchange="to_value1()" style="display: none;" name="to1" value="0" id="to1"><br>
              <input type="Number" class="form-control" onchange="to_value2()" style="display: none;" name="to2" value="0" id="to2"><br>
              <input type="Number" class="form-control" onchange="to_value3()" style="display: none;" name="to3" value="0" id="to3"><br>
              <input type="Number" class="form-control" onchange="to_value4()" style="display: none;" name="to4" value="0" id="to4"><br>
              <input type="Number" class="form-control" onchange="to_value5()" style="display: none;" name="to5" value="0" id="to5"><br>
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

            <div class="col-md-3">
              <label>Amount</label>
            <div class="input-group">
              <input type="text" class="form-control col-md-9" aria-label="Text input with dropdown button" placeholder="Amount" name="amount">
              <div class="input-group-append col-md-3 p-0">
 
                  <select class=" form-control custom-select operator"  name="operator" id="operator">
                  <option value="">Operator</option>
                           <option value="1">></option>
                           <option value="2"><</option>
                           <option value="3">=</option>
                        </select>

              </div>
            </div>
          </div>


            <!-- <div class="col-md-2">
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
              </div> -->
          </div>
          
          <table class="table table-responsive" id="team-list">
                  <thead>
                    <tr>
                    <th rowspan="2"> S.no </th>
                    <th rowspan="2"> Date</th>
                    <th rowspan="2"> Name Of Item </th>
                    <th rowspan="2"> Group</th>
                    <th rowspan="2"> Category</th>
                    <th align="center" colspan="3"> Opening Stock</th>
                    <th align="center" colspan="3"> Purchase Estimation</th>
                    <th align="center" colspan="3"> Purchase Order</th>
                    <th align="center" colspan="3"> Receipt Note</th>
                    <th align="center" colspan="3"> Purchase Entry</th>
                    <th align="center" colspan="3"> Rejection Out</th>
                    <th align="center" colspan="3"> Debit Note</th>
                    <th align="center" colspan="3"> Sales Estimation</th>
                    <th align="center" colspan="3"> Sales Order</th>
                    <th align="center" colspan="3"> Delivery Note</th>
                    <th align="center" colspan="3"> Sales Entry</th>
                    <th align="center" colspan="3"> Rejection In</th>
                    <th align="center" colspan="3"> Credit Note</th>
                    </tr>
                    <tr>
                      <th>Qty</th>
                      <th>Rate</th>
                      <th>Amount</th>
                      <th>Qty</th>
                      <th>Rate</th>
                      <th>Amount</th>
                      <th>Qty</th>
                      <th>Rate</th>
                      <th>Amount</th>
                      <th>Qty</th>
                      <th>Rate</th>
                      <th>Amount</th>
                      <th>Qty</th>
                      <th>Rate</th>
                      <th>Amount</th>
                      <th>Qty</th>
                      <th>Rate</th>
                      <th>Amount</th>
                      <th>Qty</th>
                      <th>Rate</th>
                      <th>Amount</th>
                      <th>Qty</th>
                      <th>Rate</th>
                      <th>Amount</th>
                      <th>Qty</th>
                      <th>Rate</th>
                      <th>Amount</th>
                      <th>Qty</th>
                      <th>Rate</th>
                      <th>Amount</th>
                      <th>Qty</th>
                      <th>Rate</th>
                      <th>Amount</th>
                      <th>Qty</th>
                      <th>Rate</th>
                      <th>Amount</th>
                      <th>Qty</th>
                      <th>Rate</th>
                      <th>Amount</th> 
                    </tr>
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
    <script src="{{asset('assets/js/ageing_analysis/ageing.js')}}"></script>
    <!-- card body end@ -->
  </div>
</div>
@endsection

