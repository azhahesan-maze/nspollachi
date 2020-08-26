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
            <th>Receipt Note No</th>
            <th>Receipt Note Date</th>
            <th>Supplier Name</th>
            <th>overall Discount</th>
            <th>Round Off</th>
            <th>Net Value</th>
           <th>Action </th>
          </tr>
        </thead>
        <tbody>
          @foreach($rejection_out as $key=> $value)
            <tr>
              <td>{{ $key+1 }}</td>
              <td>{{ $value->r_out_no }}</td>
              <td>{{ $value->r_out_date }}</td>
              <td>{{ $value->p_no }}</td>
              <td>{{ $value->p_date }}</td>
              <td>{{ $value->rn_no }}</td>
              <td>{{ $value->rn_date }}</td>
              @if(isset($value->supplier->name) && !empty($value->supplier->name))
              <td>{{ $value->supplier->name }}</td>
              @else
              <td></td>
              @endif
              <td>{{ $value->overall_discount }}</td>
              <td>{{ $value->round_off }}</td>
              <td>{{ $value->total_net_value }}</td>
              <td> 
                <!-- <a href="{{ route('rejection_out.show',$value->r_out_no) }}" class="px-2 py-1 bg-info text-white rounded"><i class="fa fa-eye" aria-hidden="true"></i></a> -->
                
                @if($value->rn_no == '')
                <a href="{{url('rejection_out/delete/'.$value->p_no )}}" onclick="return confirm('Are you sure ?')" class="px-2 py-1 bg-danger text-white rounded"><i class="fa fa-trash" aria-hidden="true"></i></a>
                @else
                <a href="{{url('rejection_out/delete/'.$value->rn_no )}}" onclick="return confirm('Are you sure ?')" class="px-2 py-1 bg-danger text-white rounded"><i class="fa fa-trash" aria-hidden="true"></i></a>
                @endif
                
                
                
                <br><br>
                <!-- <a href="{{url('rejection_out/item_details/'.$value->r_out_no )}}" class="px-1 py-0 bg-info text-white rounded"><i class="fa fa-eye" aria-hidden="true"></i>Item Details</a>
                <a href="{{url('rejection_out/expense_details/'.$value->r_out_no )}}" class="px-1 py-0 bg-info text-white rounded"><i class="fa fa-eye" aria-hidden="true"></i>Expense Details</a> -->
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