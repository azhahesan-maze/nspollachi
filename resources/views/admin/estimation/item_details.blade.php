@extends('admin.layout.app')
@section('content')
<div class="col-12 body-sec">
  <div class="card">
    <!-- card header start@ -->
    <div class="card-header px-2">
      <div class="row">
        <div class="col-4">
          <h3>Purchased Item Details</h3>
        </div>
        <div class="col-8 mr-auto">
          <ul class="h-right-btn mb-0 pl-0">
            <li><button type="button" class="btn btn-success"><a href="{{ route('purchase.index') }}">Back</a></button></li>
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
            <th>Invoice S.No</th>
           <th>Item Code</th>
           <th>Item Name</th>
           <th>MRP</th>
           <th>HSN</th>
           <th>Quantity</th>
           <th>Tax Rate</th>
           <th>Rate Exclusive Tax</th>
           <th>Rate Inclusive Tax</th>
           <th>Amount</th>
           <th>Discount</th>
           <th>Net Price</th>
           <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php 
          $count=1;
          ?>
          @foreach($items as $item)
          @if($item->item_code == '')
          @else
            <tr>
              <td>{{ $count }}</td>
              <td>{{ $item->invoice_no }}</td>
              <td>{{ $item->code }}</td>
              <td>{{ $item->item_name }}</td>
              <td>{{ $item->mrp }}</td>
              <td>{{ $item->hsn }}</td>
              <td>{{ $item->quantity }}</td>
              <td>{{ $item->tax_rate }}</td>
              <td>{{ $item->rate_exclusive }}</td>
              <td>{{ $item->rate_inclusive }}</td>
              <td>{{ $item->amount }}</td>
              <td>{{ $item->discount }}</td>
              <td>{{ $item->net_price }}</td>
              <td> 
                <a href="" class="px-2 py-1 bg-info text-white rounded"><i class="fa fa-eye" aria-hidden="true"></i></a>
                <a href="" class="px-2 py-1 bg-success text-white rounded"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                <a onclick="return confirm('Are you sure ?')" href="" class="px-2 py-1 bg-danger text-white rounded"><i class="fa fa-trash" aria-hidden="true"></i></a>
              </td>
            </tr>
            <?php
            $count++;
            ?>
          
          @endif
         @endforeach
         
        </tbody>
      </table>

    </div>
    <!-- card body end@ -->
  </div>
</div>
@endsection