@extends('admin.layout.app')
@section('content')
<div class="col-12 body-sec">
  <div class="card">
    <!-- card header start@ -->
    <div class="card-header px-2">
      <div class="row">
        <div class="col-4">
          <h3>List Purchase Order</h3>
        </div>
        <div class="col-8 mr-auto">
          <ul class="h-right-btn mb-0 pl-0">
            @if($check_id != 1)
            <li><button type="button" class="btn btn-success"><a href="{{ route('purchase_order.create') }}">Purchase Order</a></button></li>
            @else
            @endif
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
            <th>Estimation No </th>
            <th>Estimation Date </th>
            <th>Supplier Name</th>
            <th>Purchase Type</th>
            <th>overall Discount</th>
            <!-- <th>Round Off</th> -->
            <th>Taxable Value</th>
            <th>Tax Value</th>
            <th>Net Value</th>
           <th>Action </th>
          </tr>
        </thead>
        <tbody>
          @foreach($purchaseorder as $key => $value)
            <tr>
              <td>{{ $key+1 }}</td>
              <td>{{ $value->po_no }}</td>
              <td>{{ $value->po_date }}</td>
              <td>{{ $value->estimation_no }}</td>
              <td>{{ $value->estimation_date }}</td>
              @if(isset($value->supplier->name) && !empty($value->supplier->name))
              <td>{{ $value->supplier->name }}</td>
              @else
              <td></td>
              @endif
              @if($value->purchase_type == 1)
              <td>Cash Purchase</td>
              @else
              <td>Credit Purchase</td>
              @endif
              <td>{{ $value->overall_discount }}</td>
              <!-- <td>{{ $value->round_off }}</td> -->
              <td></td>
              <td></td>
              <td>{{ $value->total_net_value }}</td>
              <td> 
                <a href="{{ route('purchase_order.show',$value->po_no) }}" class="px-2 py-1 bg-info text-white rounded"><i class="fa fa-eye" aria-hidden="true"></i></a>
                <a href="{{ route('purchase_order.edit',$value->po_no) }}" class="px-2 py-1 bg-success text-white rounded"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                <a href="{{url('purchase_order/delete/'.$value->po_no )}}" onclick="return confirm('Are you sure ?')" class="px-2 py-1 bg-danger text-white rounded"><i class="fa fa-trash" aria-hidden="true"></i></a>

                <br><br>
                <a href="{{url('purchase_order/item_details/'.$value->po_no )}}" class="px-1 py-0 bg-info text-white rounded"><i class="fa fa-eye" aria-hidden="true"></i>Item Details</a>
                <a href="{{url('purchase_order/expense_details/'.$value->po_no )}}" class="px-1 py-0 bg-info text-white rounded"><i class="fa fa-eye" aria-hidden="true"></i>Expense Details</a>
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