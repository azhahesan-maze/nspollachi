@extends('admin.layout.app')
@section('content')
<div class="col-12 body-sec">
  <div class="card container px-0">
    <!-- card header start@ -->
    <div class="card-header px-2">
      <div class="row">
        <div class="col-4">
          <h3>View Account Group</h3>
        </div>
        <div class="col-8 mr-auto">
          <ul class="h-right-btn mb-0 pl-0">
            <li><button type="button" class="btn btn-success"><a href="{{route('account_group.index')}}">Back</a></button></li>
          </ul>
        </div>
      </div>
    </div>
    <!-- card header end@ -->
    <div class="card-body">
      <div class="form-row">
        <div class="col-md-6">
          <div class="form-group row">
            <label for="validationCustom01" class="col-sm-3 col-form-label">Name :</label>
            <label for="validationCustom01" class="col-sm-3 col-form-label"> {{ $account_group->name }}</label>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group row">
            <label for="validationCustom01" class="col-sm-3 col-form-label">Under :</label>
            @if($account_group->under == 'Primary')
            <label for="validationCustom01" class="col-sm-3 col-form-label">Primary </label>
            @else
            <label for="validationCustom01" class="col-sm-3 col-form-label">{{ $account_group->under }} </label>
            @endif
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group row">
            <label for="validationCustom01" class="col-sm-3 col-form-label">Tax Name :</label>
            <label for="validationCustom01" class="col-sm-3 col-form-label">{{ $account_group->name_of_tax }} </label>
          </div>
        </div>

        <div class="col-md-6">
          <div class="form-group row">
            <label for="validationCustom01" class="col-sm-3 col-form-label">Rate Of Tax :</label>
            <label for="validationCustom01" class="col-sm-3 col-form-label">{{ $account_group->rate_of_tax }} </label>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group row">
            <label for="validationCustom01" class="col-sm-3 col-form-label">Type :</label>
            @if($account_group->type == 1)
            <label for="validationCustom01" class="col-sm-3 col-form-label">Goods </label>
            @else
            <label for="validationCustom01" class="col-sm-3 col-form-label">Service </label>
            @endif
          </div>
        </div>
        
      </div>
    </div>
    <!-- card body end@ -->
  </div>
</div>
@endsection