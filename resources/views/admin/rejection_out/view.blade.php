@extends('admin.layout.app')
@section('content')
<div class="col-12 body-sec">
  <div class="card">
    <!-- card header start@ -->
    <div class="card-header px-2">
      <div class="row">
        <div class="col-4">
          <h3>List Rejection Out</h3>
        </div>
        <div class="col-8 mr-auto">
          <ul class="h-right-btn mb-0 pl-0">
            <li><button type="button" class="btn btn-success"><a href="{{ route('rejection_out.create') }}">Rejection Out</a></button></li>
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
            <th>Voucher No </th>
            <th>Voucher Date </th>
            <th>Purchase Entry No </th>
            <th>Purchase Entry Date </th>
            <th>Supplier Name</th>
            <th>overall Discount</th>
            <th>Round Off</th>
            <th>Net Value</th>
           <th>Action </th>
          </tr>
        </thead>
        <tbody>
          @foreach($p_no as $key=> $value)
            <tr>
              <td>{{ $key+1 }}</td>
              <td>{{ $rejection_out[$key]->r_out_no }}</td>
              <td>{{ $rejection_out[$key]->r_out_date }}</td>
              <td>{{ $rejection_out[$key]->p_no }}</td>
              <td>{{ $rejection_out[$key]->p_date }}</td>
              @if(isset($rejection_out[$key]->supplier->name) && !empty($rejection_out[$key]->supplier->name))
              <td>{{ $rejection_out[$key]->supplier->name }}</td>
              @else
              <td></td>
              @endif
              <td>{{ $rejection_out[$key]->overall_discount }}</td>
              <td>{{ $rejection_out[$key]->round_off }}</td>
              <td>{{ $rejection_out[$key]->total_net_value }}</td>
              <td> 
                <a href="{{ route('rejection_out.show',$rejection_out[$key]->r_out_no) }}" class="px-2 py-1 bg-info text-white rounded"><i class="fa fa-eye" aria-hidden="true"></i></a>
                <a href="{{ route('rejection_out.edit',$rejection_out[$key]->r_out_no) }}" class="px-2 py-1 bg-success text-white rounded"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                <a href="{{url('rejection_out/delete/'.$rejection_out[$key]->p_no )}}" onclick="return confirm('Are you sure ?')" class="px-2 py-1 bg-danger text-white rounded"><i class="fa fa-trash" aria-hidden="true"></i></a>

                <br><br>
                <!-- <a href="{{url('rejection_out/item_details/'.$rejection_out[$key]->r_out_no )}}" class="px-1 py-0 bg-info text-white rounded"><i class="fa fa-eye" aria-hidden="true"></i>Item Details</a>
                <a href="{{url('rejection_out/expense_details/'.$rejection_out[$key]->r_out_no )}}" class="px-1 py-0 bg-info text-white rounded"><i class="fa fa-eye" aria-hidden="true"></i>Expense Details</a> -->
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