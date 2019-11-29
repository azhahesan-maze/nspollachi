<!doctype html>
<html lang="en">
  <head>
  <title>Ns Pollachi</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.css')}}">
    <!-- select 2 -->
    <link rel="stylesheet" href="{{asset('assets/css/select2.min.css')}}">
    <!-- date picker -->
    <link rel="stylesheet" href="{{asset('assets/css/gijgo.min.css')}}">
    <!-- data -->
    <link rel="stylesheet" href="{{asset('assets/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/buttons.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/fixedHeader.dataTables.min.css')}}">
    <!-- font-awasome -->
    <link rel="stylesheet" href="{{asset('assets/css/font-awesome.min.css')}}">
    <!-- main js -->
    <script src="{{asset('assets/js/jquery-3.3.1.js')}}"></script>
    
    

  </head>
  <body>

  <div class="container-fluid px-0">
<!-- header -->
    <div class="row mx-0 header">
    <div class="col-12 px-0">
    <nav class="navbar navbar-expand-lg navbar-light bg-green px-2 py-0">
      <a class="navbar-brand" href="#"><img src="{{asset('assets/image/logo.png')}}" class="img-fluid" alt="logo" /></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="#">Dashboard</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Favourties</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Daily Task
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="#">Action</a>
              <a class="dropdown-item" href="#">Another action</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#">Something else here</a>
            </div>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Transactions
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="#">Action</a>
              <a class="dropdown-item" href="#">Another action</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#">Something else here</a>
            </div>
          </li>
          <li class="nav-item dropdown menu-large">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Masters
            </a>
            <ul class="dropdown-menu megamenu">
                    <div class="row mx-0">
                    <li class="col-md-3 dropdown-item">
                        <ul>
                            <li class="dropdown-header">Location</li>
                            <li><a href="{{url('master/state')}}">State</a></li>
                            <li><a href="{{url('master/district')}}">District</a></li>
                            <li><a href="{{url('master/city')}}">City</a></li>
                            <li><a href="{{url('master/location')}}">Location</a></li>
                        </ul>
                    </li>
                    <li class="col-md-3 dropdown-item">
                        <ul>
                            <li class="dropdown-header">Bank</li>
                            <li><a href="{{url('master/bank')}}">Bank</a></li>
                            <li><a href="{{url('master/bank-branch')}}">Bank Branch</a></li>
                            <li><a href="{{url('master/denomination')}}">Denomination</a></li>
                            <li><a href="{{url('master/accounts-type')}}">Accounts Type</a></li>
                        </ul>
                    </li>
                    <li class="col-md-3 dropdown-item">
                        <ul>
                            <li class="dropdown-header">Employee</li>
                            <li><a href="{{url('master/department')}}">Department</a></li>
                            <li><a href="{{url('master/designation')}}">Desigination</a></li>
                            <li><a href="{{url('master/employee')}}">Employee</a></li>
                        </ul>
                    </li>
                    <li class="col-md-3 dropdown-item">
                        <ul>
                            <li class="dropdown-header">Accounts</li>
                            <li><a href="{{url('master/expense-type')}}">Expense</a></li>
                            <li><a href="{{url('master/income-type')}}">Income</a></li>
                            <li><a href="{{url('master/gst-type')}}">Gst</a></li>
                            <li><a href="{{url('master/gift-voucher')}}">Gift Voucher</a></li>
                        </ul>
                    </li>

                    <li class="col-md-3 dropdown-item">
                        <ul>
                            <li class="dropdown-header"></li>
                            <li><a href="{{url('master/agent')}}">Agent</a></li>
                            <li><a href="{{url('master/customer')}}">customer</a></li>
                          
                        </ul>
                    </li>
                    
            </ul>        
            <!-- <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="{{url('master/state')}}">State</a>
              <a class="dropdown-item" href="{{url('master/district')}}">District</a>
              <a class="dropdown-item" href="{{url('master/city')}}">City</a>
              <a class="dropdown-item" href="{{url('master/location')}}">Location</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="{{url('master/bank')}}">Bank</a>
              <a class="dropdown-item" href="{{url('master/bank-branch')}}">Bank Branch</a>
              <a class="dropdown-item" href="{{url('master/denomination')}}">Denomination</a>
              <a class="dropdown-item" href="{{url('master/accounts-type')}}">Accounts Type</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="{{url('master/department')}}">Department</a>
              <a class="dropdown-item" href="{{url('master/designation')}}">Desigination</a>
              <a class="dropdown-item" href="{{url('master/denomination')}}">Employee</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="{{url('master/expense-type')}}">Expense</a>
              <a class="dropdown-item" href="{{url('master/income-type')}}">Income</a>
              <a class="dropdown-item" href="{{url('master/gst-type')}}">Gst</a>
              <a class="dropdown-item" href="{{url('master/gift-voucher')}}">Gift Voucher</a>
            </div> -->
            
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Reports
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="#">Action</a>
              <a class="dropdown-item" href="#">Another action</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#">Something else here</a>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link  " href="#">Disabled</a>
          </li>
        </ul>
        <ul class="navbar-nav ml-auto login">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Admin
          <!--  <span>     
              <img src="./" alt="..." class="admin-logo">
            </span> -->
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="#">Profile</a>
            <a class="dropdown-item" href="#">Logout</a>
          </div>
        </li>
      </ul>
      </div>
    </nav>
  </div>
  </div>
    <!-- end.!@ -->

    @if ($message=Session::get('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong>{{ $message }}</strong>
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>  
    @endif
    @if ($message=Session::get('failure'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
      <strong>{{ $message }}</strong>
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>  
       
    @endif