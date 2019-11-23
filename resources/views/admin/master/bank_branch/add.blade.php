@extends('admin.layout.app')
@section('content')
<div class="col-12 body-sec">
  <div class="card container px-0">
    <!-- card header start@ -->
    <div class="card-header px-2">
      <div class="row">
        <div class="col-4">
          <h3>Add Bank Branch</h3>
        </div>
        <div class="col-8 mr-auto">
          <ul class="h-right-btn mb-0 pl-0">
            <li><button type="button" class="btn btn-success"><a href="{{url('master/bank-branch')}}">Back</a></button></li>
          </ul>
        </div>
      </div>
    </div>
    <!-- card header end@ -->
    <div class="card-body">

      <form method="post" class="form-horizontal needs-validation" novalidate action="{{url('master/bank-branch/store')}}" enctype="multipart/form-data">
        {{csrf_field()}}

        <div class="form-row">
          <div class="col-md-7">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Branch Name <span class="mandatory">*</span></label>
              <div class="col-sm-8">
                <input type="text" class="form-control name only_allow_alp_num_dot_com_amp branch" placeholder="Branch Name" name="branch" value="{{old('branch')}}" required>
                <span class="mandatory"> {{ $errors->first('branch')  }} </span>
                <div class="invalid-feedback">
                  Enter valid Branch Name
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-7">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Bank <span class="mandatory">*</span></label>
              <div class="col-sm-8">
                <select class="js-example-basic-multiple col-12 custom-select bank_id" name="bank_id" required>
                  <option value="">Choose Bank</option>
                  @foreach($bank as $value)
                  <option value="{{ $value->id }}" {{ old('bank_id') == $value->id ? 'selected' : '' }}>{{ $value->name }}</option>
                  @endforeach
                </select>
                <span class="mandatory"> {{ $errors->first('bank_id')  }} </span>
                <div class="invalid-feedback">
                  Enter valid Bank
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-7">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Ifsc Code <span class="mandatory">*</span></label>
              <div class="col-sm-8">
                <input type="text" class="form-control name  ifsc" placeholder="IFSC Code" name="ifsc" value="{{old('ifsc')}}" required>
                <span class="mandatory"> {{ $errors->first('ifsc')  }} </span>
                <div class="invalid-feedback">
                  Enter valid Ifsc Code
                </div>
              </div>
            </div>
          </div>
          
        </div>
        <div class="col-md-7 text-right">
          <button class="btn btn-success" name="add" type="submit">Submit</button>
        </div>
      </form>
    </div>
    <!-- card body end@ -->
  </div>
</div>
@endsection