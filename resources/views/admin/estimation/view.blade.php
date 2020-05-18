@extends('admin.layout.app')
@section('content')
<div class="col-12 body-sec">
  <div class="card">
    <!-- card header start@ -->
    <div class="card-header px-2">
      <div class="row">
        <div class="col-4">
          <h3>List Purchase</h3>
        </div>
        <div class="col-8 mr-auto">
          <ul class="h-right-btn mb-0 pl-0">
            <li><button type="button" class="btn btn-success"><a href="{{ route('purchase.create') }}">Purchase</a></button></li>
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
            <th>Gate Pass No</th>
            <th>Voucher No </th>
            <th>Voucher Date </th>
            <th>Receipt Note No </th>
            <th>Supplier Invoice No </th>
            <th>Supplier Invoice Date </th>
            <th>Supplier Details </th>
            <th>Order Details </th>
            <th>Transport Details </th>
            <th>Remarks </th>
            <th>Supplier Invoice Value </th>
            <th>Total Amount</th>
            <th>Total Net Price</th>
           <th>Action </th>
          </tr>
        </thead>
        <tbody>
          <?php 
          $count=1;
          ?>
          @foreach($purchases as $purchase)
          
            <tr>
              <td>{{ $count }}</td>
              <td><a href="{{ url('purchase/item_details/'.$purchase->gatepass_id) }}">{{ $purchase->gatepassentries_gatepass_no }}</a></td>
              <td>{{ $purchase->voucher_no }}</td>
              <td>{{ $purchase->voucher_date }}</td>
              <td>{{ $purchase->receipt_note_no }}</td>
              <td>{{ $purchase->supplier_invoice_no }}</td>
              <td>{{ $purchase->supplier_invoice_date }}</td>
              <td>{{ $purchase->supplier_details }}</td>
              <td>{{ $purchase->order_details }}</td>
              <td>{{ $purchase->transport_details }}</td>
              <td>{{ $purchase->remarks }}</td>
              <td>{{ $purchase->supplier_invoice_value }}</td>
              <td>{{ $purchase->total_amount }}</td>
              <td>{{ $purchase->total_price }}</td>
              <td> 
                <a href="" class="px-2 py-1 bg-info text-white rounded"><i class="fa fa-eye" aria-hidden="true"></i></a>
                <a href="" class="px-2 py-1 bg-success text-white rounded"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                <a onclick="return confirm('Are you sure ?')" href="" class="px-2 py-1 bg-danger text-white rounded"><i class="fa fa-trash" aria-hidden="true"></i></a>
              </td>
            </tr>
            <?php
            $count++;
            ?>
          

         @endforeach
         
        </tbody>
      </table>

    </div>
    <!-- card body end@ -->
  </div>
</div>
@endsection