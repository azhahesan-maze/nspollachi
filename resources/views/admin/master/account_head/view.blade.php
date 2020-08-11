@extends('admin.layout.app')
@section('content')

<div class="col-12 body-sec">
  <div class="card">
    <!-- card header start@ -->
    <div class="card-header px-2">
      <div class="row">
        <div class="col-4">
          <h3>List Account Head</h3>
        </div>
        <div class="col-8 mr-auto">
          <ul class="h-right-btn mb-0 pl-0">
            <li><button type="button" class="btn btn-success"><a href="{{route('account_head.create')}}">Add Account Head</a></button></li>
          </ul>
        </div>
      </div>
    </div>
    <!-- card header end@ -->
    <div class="card-body">
      <table id="master" class="table table-striped table-bordered" style="width:100%">
        <thead>
          <tr>
            <th>S.No</th>
            <th>Name</th>
            <th>Under</th>
            <th>Name Of Tax</th>
            <th>Rate Of Tax</th>
            <th>Type</th>
            <th>Opening Balance</th>
           <th>Action </th>
          </tr>
        </thead>
        <tbody>
          
          @foreach($account_head as $key => $value)
            <tr>
              <td>{{ $key+1 }}</td>
              <td>{{ $value->name }}</td>
              @if($value->under == 'Primary')
              <td>Primary</td>
              @else
              @if(isset($value->under_data->name) && !empty($value->under_data->name))
              <td>{{ $value->under_data->name }}</td>
              @endif
              @endif
              <td>{{ $value->name_of_tax }}</td>
              <td>{{ $value->rate_of_tax }}</td>
              @if($value->type == 1)
              <td>Goods</td>
              @elseif($value->type == '0')
              <td>Service</td>
              @else
              <td></td>
              @endif
              <td>{{ $value->opening_balance }}</td>
              <td> 
                <a href="{{ route('account_head.show',$value->id) }}" class="px-2 py-1 bg-info text-white rounded"><i class="fa fa-eye" aria-hidden="true"></i></a>
                <a href="{{ route('account_head.edit',$value->id) }}" class="px-2 py-1 bg-success text-white rounded"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                <a onclick="return confirm('Are you sure ?')" href="{{ url('account_head/delete/'.$value->id ) }}" class="px-2 py-1 bg-danger text-white rounded"><i class="fa fa-trash" aria-hidden="true"></i></a>
              </td>
            </tr>
         @endforeach
        </tbody>
      </table>

    </div>
    <!-- card body end@ -->
  </div>
</div>
@endsection