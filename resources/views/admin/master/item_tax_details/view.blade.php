@extends('admin.layout.app')
@section('content')
<div class="col-12 body-sec">
  <div class="card">
    <!-- card header start@ -->
    <div class="card-header px-2">
      <div class="row">
        <div class="col-4">
          <h3> List Item Tax Details </h3>
        </div>
        <div class="col-8 mr-auto">
          <ul class="h-right-btn mb-0 pl-0">
            <li><button type="button" class="btn btn-success"><a href="{{url('master/item-tax-details/create')}}">Add Item Tax Details </a></button></li>
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
            <th>Item Name</th>
            <th>Item Code</th>
          <th>{{ $category_1 }}</th>
            <th>{{ $category_2 }}</th>
            <th>{{ $category_3 }}</th>
            <th>SGST</th>
            <th>IGST</th>
            <th>CGST</th>
            <th>Effective From Date</th>
            <th> Action </th>
          </tr>
        </thead>
        <tbody>
          
          @foreach($item_tax_details as $key=>$value)
            <tr>
              <td>{{ $key+1 }}</td>
              <td>{{ $value->item->name}}</td>
             
              <td>{{ $value->item->code}}</td>
              <td>{{ isset($value->category_one->name) ? $value->category_one->name : "" }}</td>
              <td>{{ $value->category_two->name}}</td>
              <td>{{ $value->category_three->name}}</td>
              <td>{{ $value->sgst}}</td>
              <td>{{ $value->igst}}</td>
              <td>{{ $value->cgst}}</td>
              <td>{{ $value->valid_from !="" ? date('d-m-Y',strtotime($value->valid_from )) : ""}}</td>
            
              
              <td> 
                <a href="{{url('master/item-tax-details/show/'.$value->id )}}" class="px-1 py-0 bg-info text-white rounded"><i class="fa fa-eye" aria-hidden="true"></i></a>
                <a href="{{url('master/item-tax-details/edit/'.$value->id )}}" class="px-1 py-0 bg-success text-white rounded"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                <a onclick="return confirm('Are you sure ?')" href="{{url('master/item-tax-details/delete/'.$value->id )}}" class="px-1 py-0 bg-danger text-white rounded"><i class="fa fa-trash" aria-hidden="true"></i></a>
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