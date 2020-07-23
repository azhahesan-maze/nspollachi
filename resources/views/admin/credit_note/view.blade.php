@extends('admin.layout.app')
@section('content')
<div class="col-12 body-sec">
  <div class="card">
    <!-- card header start@ -->
    <div class="card-header px-2">
      <div class="row">
        <div class="col-4">
          <h3>List Credit Note</h3>
        </div>
        <div class="col-8 mr-auto">
          <ul class="h-right-btn mb-0 pl-0">
            <li><button type="button" class="btn btn-success"><a href="{{ route('credit_note.create') }}">Credit Note</a></button></li>
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
            <th>Sale Entry No </th>
            <th>Sale Entry Date </th>
            <th>Rejection In No </th>
            <th>Customer Name</th>
            <th>overall Discount</th>
            <th>Round Off</th>
            <th>Net Value</th>
           <th>Action </th>
          </tr>
        </thead>
        <tbody>
          @foreach($credit_note as $key => $value)
            <tr>
              <td>{{ $key+1 }}</td>
              <td>{{ $value->cn_no }}</td>
              <td>{{ $value->cn_date }}</td>
              <td>{{ $value->s_no }}</td>
              <td>{{ $value->s_date }}</td>
              <td>{{ $value->r_in_no }}</td>
              @if(isset($value->customer->name) && !empty($value->customer->name))
              <td>{{ $value->customer->name }}</td>
              @else
              <td></td>
              @endif
              <td>{{ $value->overall_discount }}</td>
              <td>{{ $value->round_off }}</td>
              <td>{{ $value->total_net_value }}</td>
              <td> 
                <a href="{{ route('credit_note.show',$value->cn_no) }}" class="px-2 py-1 bg-info text-white rounded"><i class="fa fa-eye" aria-hidden="true"></i></a>
                <a href="{{ route('credit_note.edit',$value->cn_no) }}" class="px-2 py-1 bg-success text-white rounded"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                <a href="{{url('credit_note/delete/'.$value->cn_no )}}" onclick="return confirm('Are you sure ?')" class="px-2 py-1 bg-danger text-white rounded"><i class="fa fa-trash" aria-hidden="true"></i></a>

                <br><br>
                <a href="{{url('credit_note/item_details/'.$value->cn_no )}}" class="px-1 py-0 bg-info text-white rounded"><i class="fa fa-eye" aria-hidden="true"></i>Item Details</a>
                <a href="{{url('credit_note/expense_details/'.$value->cn_no )}}" class="px-1 py-0 bg-info text-white rounded"><i class="fa fa-eye" aria-hidden="true"></i>Expense Details</a>
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