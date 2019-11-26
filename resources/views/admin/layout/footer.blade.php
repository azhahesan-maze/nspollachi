<section class="foot1">

      <div class="col-12 px-0">
      <div class="row mx-0">
        <div class="col-6">
          <p>© 2019 Copyright.</p>
        </div>
        <div class="col-6 text-right">
           <p>Mazenetsolution</p> 
        </div>
      </div>
    
</div>
</section>
    
</div>
    
    <!-- select 2 -->
    <script src="{{asset('assets/js/select2.min.js')}}"></script>
    <!-- date picker -->
    <script src="{{asset('assets/js/gijgo.min.js')}}"></script>
    <!-- Optional JavaScript -->
    <script src="{{asset('assets/js/custom.js')}}"></script>
    <script src="{{asset('assets/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('assets/js/dataTables.fixedHeader.min.js')}}"></script>
    <script src="{{asset('assets/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('assets/js/buttons.flash.min.js')}}"></script>
    <script src="{{asset('assets/js/buttons.bootstrap4.min.js')}}"></script>
    <script src="{{asset('assets/js/jszip.min.js')}}"></script>
    <script src="{{asset('assets/js/pdfmake.min.js')}}"></script>
    <script src="{{asset('assets/js/vfs_fonts.js')}}"></script>
    <script src="{{asset('assets/js/buttons.html5.min.js')}}"></script>
    <script src="{{asset('assets/js/buttons.print.min.js')}}"></script>
    <script src="{{asset('assets/js/buttons.colVis.min.js')}}"></script>
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="{{asset('assets/js/popper.min.js')}}"></script>
    <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>

    <script>



$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});


$('.dob').datepicker({
    uiLibrary: 'bootstrap4',
    iconsLibrary: 'fontawesome',
    format: 'dd-mm-yyyy',
    icons: {
        rightIcon: '<i class="fa fa-calendar" aria-hidden="true"></i>'
    }
});

$('.valid_from').datepicker({
    uiLibrary: 'bootstrap4',
    iconsLibrary: 'fontawesome',
    format: 'dd-mm-yyyy',
    icons: {
        rightIcon: '<i class="fa fa-calendar" aria-hidden="true"></i>'
    }
});



    $('.only_allow_alp_num_dot_com_amp').keypress(function (e) {
    var regex = new RegExp("^[a-zA-Z0-9.,& ]+$");
    var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
    if (regex.test(str)) {
        return true;
    }

    e.preventDefault();
    return false;
});

$('.only_allow_digit').keypress(function (e) {
    var regex  = new RegExp("^[0-9]+$");
    var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
    if (regex.test(str)) {
        return true;
    }

    e.preventDefault();
    return false;
});



    </script>

    </body>
</html>

