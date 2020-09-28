@extends('admin.layout.app')
@section('content')
<div class="col-12 body-sec">
  <div class="card container px-0">
    <!-- card header start@ -->
    <div class="card-header px-2">
      <div class="row">
        <div class="col-4">
          <h3>Edit Account Head</h3>
        </div>
        <div class="col-8 mr-auto">
          <ul class="h-right-btn mb-0 pl-0">
            <li><button type="button" class="btn btn-success"><a href="{{ route('account_head.index') }}">Back</a></button></li>
          </ul>
        </div>
      </div>
    </div>
    <!-- card header end@ -->
    <div class="card-body">
    
      <form  method="post" class="form-horizontal needs-validation" action="{{route('account_head.update',$account_head->id)}}" enctype="multipart/form-data">
      {{csrf_field()}}
      @method('PATCH')

        <div class="form-row">
          <div class="col-md-6">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Name:</label>
              <div class="col-sm-8">
                <input type="text" required="" class="form-control name" placeholder="Name" name="name" value="{{ $account_head->name }}">
                
              </div>
            </div>
          </div>

        <div class="col-md-6">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Under : </label>
              <div class="col-sm-8">
                <select class="js-example-basic-multiple col-12 form-control custom-select under"  name="under" id="under" required="">
                  @if(isset($account_head->under_data->id) && !empty($account_head->under_data->id))
                  <option value="{{$account_head->under_data->id}}">{{$account_head->under_data->name}}</option>
                  @endif
                  @foreach($group as $value)
                  <option value="{{$value->id}}">{{$value->name}}</option>
                  @endforeach
                </select>
              </div>
            </div>
          </div>
        </div>
        <br>

        <div class="form-row">
          <div class="col-md-6">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Tax:</label>
               @if($account_head->tax == 1)
              <label for="validationCustom01" class="col-sm-3 col-form-label">Yes</label>
              <input type="radio" class="tax" checked="" placeholder="Name" onclick="yes()" name="tax" value="1">
              <label for="validationCustom01" class="col-sm-3 col-form-label">No</label>
                <input type="radio" class="tax" placeholder="Name" onclick="no()" name="tax" value="0">
                @else
                <label for="validationCustom01" class="col-sm-3 col-form-label">Yes</label>
              <input type="radio" class="tax" placeholder="Name" onclick="yes()" name="tax" value="1">
              <label for="validationCustom01" class="col-sm-3 col-form-label">No</label>
                <input type="radio" class="tax" placeholder="Name"  checked="" onclick="no()" name="tax" value="0">
                @endif
                
            </div>
          </div>
        </div>
        <br>
        @if($account_head->tax == 1)
        <div class="form-row col-md-12 tax_details">
          <div class="col-md-4">
            <label for="validationCustom01" class="col-sm-4 col-form-label">Name</label><br>
            <select class="js-example-basic-multiple col-12 form-control custom-select type"  name="tax_name" id="tax_name">
                @if($account_head->name_of_tax != '')
                  <option value="{{ $account_head->taxes->id }}">{{ $account_head->taxes->name }}</option>
                  @else
                  <option value="">Choose Any</option>
                  @endif
                  @foreach($tax as $value)
                  <option value="{{ $value->id }}">{{ $value->name }}</option>
                  @endforeach
            </select>
            <!-- <input type="text" class="form-control tax_name" placeholder="Name" name="tax_name" value="{{ $account_head->name_of_tax }}"> -->
          </div>
          <div class="col-md-4">
            <label for="validationCustom01" class="col-sm-4 col-form-label">Rate Of Tax</label><br>
            <input type="text" class="form-control tax_rate" placeholder="Rate Of Tax" name="tax_rate" value="{{ $account_head->rate_of_tax }}">
          </div>
          <div class="col-md-4">
            <label for="validationCustom01" class="col-sm-4 col-form-label">Type</label><br>
          <select class="js-example-basic-multiple col-12 form-control custom-select type"  name="type" id="type">
                  @if($account_head->type == 1)
                  <option value="1">Goods</option>
                  @elseif($account_head->type == 2)
                  <option value="2">Service</option>
                  @else
                  <option value="">Choose Any</option>
                  @endif
                  <option value="1">Goods</option>
                  <option value="2">Service</option>
                        </select>
          
        </div>
      </div>
      <br>
      <div class="form-row">
          <div class="col-md-6">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Opening Balance:</label>
              <div class="col-sm-8">
                <input type="text" class="form-control balance" placeholder="Opening Balance" name="balance" value="{{ $account_head->opening_balance }}">
                
              </div>
            </div>
          </div>

        <div class="col-md-6">
            <div class="form-group row">
              <div class="col-sm-3">
                <select class=" col-12 form-control custom-select dr_or_cr"  name="dr_or_cr" id="dr_or_cr">
                  @if($account_head->dr_or_cr == 1)
                  <option value="1">DR</option>
                  @elseif($account_head->dr_or_cr == 2)
                  <option value="0">CR</option>
                  @else
                  <option value="">Choose Any</option>
                  @endif
                  <option value="1">DR</option>
                  <option value="2">CR</option>
                        </select>
              </div>
            </div>
          </div>
        </div>
      @else
      <div class="form-row col-md-12 tax_details" style="display: none;">
          <div class="col-md-4">
            <label for="validationCustom01" class="col-sm-4 col-form-label">Name</label><br>
            <input type="text" class="form-control tax_name" placeholder="Name" name="tax_name" value="{{ $account_head->name_of_tax }}">
          </div>
          <div class="col-md-4">
            <label for="validationCustom01" class="col-sm-4 col-form-label">Rate Of Tax</label><br>
            <input type="text" class="form-control tax_rate" placeholder="Rate Of Tax" name="tax_rate" value="{{ $account_head->rate_of_tax }}">
          </div>
          <div class="col-md-4">
            <label for="validationCustom01" class="col-sm-4 col-form-label">Type</label><br>
          <select class="js-example-basic-multiple col-12 form-control custom-select type"  name="type" id="type">
                  @if($account_head->type == 1)
                  <option value="1">Goods</option>
                  @elseif($account_head->type == 2)
                  <option value="2">Service</option>
                  @else
                  <option value="">Choose Any</option>
                  @endif
                  <option value="1">Goods</option>
                  <option value="2">Service</option>
                        </select>
          
        </div>
      </div>
      <br>
      <div class="form-row">
          <div class="col-md-6">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Opening Balance:</label>
              <div class="col-sm-8">
                <input type="text" class="form-control balance" placeholder="Opening Balance" name="balance" value="{{ $account_head->opening_balance }}">
                
              </div>
            </div>
          </div>

        <div class="col-md-6">
            <div class="form-group row">
              <div class="col-sm-3">
                <select class=" col-12 form-control custom-select dr_or_cr"  name="dr_or_cr" id="dr_or_cr">
                  @if($account_head->dr_or_cr == 1)
                  <option value="1">DR</option>
                  @elseif($account_head->dr_or_cr == 2)
                  <option value="2">CR</option>
                  @else
                  <option value="">Choose Any</option>
                  @endif
                  <option value="1">DR</option>
                  <option value="2">CR</option>
                        </select>
              </div>
            </div>
          </div>
        </div>
      @endif
      <br>



        <div class="col-md-7 text-right">
          <button class="btn btn-success" name="add" type="submit">Update</button>
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
  function yes()
  {
    $('.tax_details').show();
  } 
  function no()
  {
    $('.tax_details').hide();
  } 
</script>

@endsection

