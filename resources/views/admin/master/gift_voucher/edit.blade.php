@extends('admin.layout.app')
@section('content')
<div class="col-12 body-sec">
  <div class="card container px-0">
    <!-- card header start@ -->
    <div class="card-header px-2">
      <div class="row">
        <div class="col-4">
          <h3>Edit Gift Voucher </h3>
        </div>
        <div class="col-8 mr-auto">
          <ul class="h-right-btn mb-0 pl-0">
            <li><button type="button" class="btn btn-success"><a href="{{url('master/gift-voucher')}}">Back</a></button></li>
          </ul>
        </div>
      </div>
    </div>
    <!-- card header end@ -->
    <div class="card-body">
    
      <form  method="post" class="form-horizontal needs-validation" novalidate action="{{url('master/gift-voucher/update/'.$giftvoucher->id)}}" enctype="multipart/form-data">
      {{csrf_field()}}

      <div class="form-row">
       
        <div class="col-md-6">
          <div class="form-group row">
            <label for="validationCustom01" class="col-sm-4 col-form-label">Gift Voucher Name <span class="mandatory">*</span></label>
            <div class="col-sm-8">
              <input type="text" class="form-control name only_allow_alp_num_dot_com_amp" placeholder="Gift Voucher Name" name="name" value="{{old('name',$giftvoucher->name)}}" required>
              <span class="mandatory"> {{ $errors->first('name')  }} </span>
              <div class="invalid-feedback">
                Enter valid Gift Voucher Name
              </div>
            </div>
          </div>
        </div>

        <div class="col-md-6">
          <div class="form-group row">
            <label for="validationCustom01" class="col-sm-4 col-form-label">Gift Voucher Code <span class="mandatory">*</span></label>
            <div class="col-sm-8">
              <input type="text" class="form-control  code" placeholder="Gift Voucher Code" name="code" value="{{old('code',$giftvoucher->code)}}" required>
              <span class="mandatory"> {{ $errors->first('code')  }} </span>
              <div class="invalid-feedback">
                Enter valid Gift Voucher Code
              </div>
            </div>
          </div>
        </div>

        <div class="col-md-6">
          <div class="form-group row">
            <label for="validationCustom01" class="col-sm-4 col-form-label">Gift Voucher Value <span class="mandatory">*</span></label>
            <div class="col-sm-8">
              <input type="text" class="form-control only_allow_digit value" placeholder="Gift Voucher Value" name="value" value="{{old('value',$giftvoucher->value)}}" required>
              <span class="mandatory"> {{ $errors->first('value')  }} </span>
              <div class="invalid-feedback">
                Enter valid Gift Voucher Value
              </div>
            </div>
          </div>
        </div>

        <div class="col-md-6">
          <div class="form-group row">
            <label for="validationCustom01" class="col-sm-4 col-form-label">Valid From Date <span class="mandatory">*</span></label>
            <div class="col-sm-8">

              @php

                  $valid_from=$giftvoucher->valid_from !="" ? date('d-m-Y',strtotime($giftvoucher->valid_from)) : "";
                  $valid_to=$giftvoucher->valid_to !="" ? date('d-m-Y',strtotime($giftvoucher->valid_to)) : "";
              @endphp

              <input type="text" class="form-control from_date" placeholder="dd-mm-yyyy" name="valid_from" value="{{old('valid_from',$valid_from)}}" required>
              <span class="mandatory"> {{ $errors->first('valid_from')  }} </span>
              <div class="invalid-feedback">
                Enter valid From Date
              </div>
            </div>
          </div>
        </div>

        <div class="col-md-6">
          <div class="form-group row">
            <label for="validationCustom01" class="col-sm-4 col-form-label">Valid To Date <span class="mandatory">*</span></label>
            <div class="col-sm-8">
              <input type="text" class="form-control to_date" placeholder="dd-mm-yyyy" name="valid_to" value="{{old('valid_to',$valid_to)}}" required>
              <span class="mandatory"> {{ $errors->first('valid_to')  }} </span>
              <div class="invalid-feedback">
                Enter valid To Date
              </div>
            </div>
          </div>
        </div>



        <div class="col-md-6">
          <div class="form-group row">
            <label for="validationCustom01" class="col-sm-4 col-form-label">Remark </label>
            <div class="col-sm-8">
              <input type="text" class="form-control  remark" placeholder="Remark" name="remark" value="{{old('remark',$giftvoucher->remark)}}">
              <span class="mandatory"> {{ $errors->first('remark')  }} </span>
              <div class="invalid-feedback">
                Enter valid Bank Code
              </div>
            </div>
          </div>
        </div>
        
      </div>
        <div class="col-md-7 text-right">
          <button class="btn btn-success" type="submit">Submit</button>
        </div>
      </form>
    </div>
    <!-- card body end@ -->
  </div>
</div>

<script>
    $(document).ready(function () {
      

        var date1 = new Date();
        $(".from_date").datepicker({
          format: 'dd-mm-yyyy',
         
           autoclose: true, 
           startDate: date1,
           endDate: '',
          setDate: date1
          }).on('changeDate', function (selected) {
            var startDate = new Date(selected.date.valueOf());

            $('.to_date').datepicker('setStartDate', startDate);
        }).on('clearDate', function (selected) {
            $('.to_date').datepicker('setStartDate', null);
        });
        $(".to_date").datepicker({
          format: 'dd-mm-yyyy', 
          
          autoclose: true,
          endDate: '',
          startDate: date1,
          setDate: date1, 
          }).on('changeDate', function (selected) {
            var endDate = new Date(selected.date.valueOf());
            $('.from_date').datepicker('setEndDate', endDate);
        }).on('clearDate', function (selected) {
            $('.from_date').datepicker('setEndDate', null);
        });


    });
</script>
@endsection