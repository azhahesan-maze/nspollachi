<footer class="foot">

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
</footer>
    
</div>
    
    <!-- select 2 -->
    <script src="{{asset('assets/js/select2.min.js')}}"></script>
   
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
    <!-- date picker -->
    <script src="{{asset('assets/js/moment.min.js')}}"></script>
    <script src="{{asset('assets/js/bootstrap-datetimepicker.min.js')}}"></script>    

    <script>
$(function () {
    var sd = new Date(), ed = new Date();
  
    
    $('.valid_froms1').datetimepicker({ 
      pickTime: false, 
      format: "DD-MM-YYYY"
    });
});


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
var today = new Date(new Date().getFullYear(), new Date().getMonth(), new Date().getDate());

$('.expiry_date').datepicker({
    
    uiLibrary: 'bootstrap4',
    iconsLibrary: 'fontawesome',
    format: 'dd-mm-yyyy',
    minDate:today,
    icons: {
        rightIcon: '<i class="fa fa-calendar" aria-hidden="true"></i>'
    }
});




$(document).on("keypress",".only_allow_alp_num_dot_com_amp",function(e)
{
    var regex = new RegExp("^[a-zA-Z0-9.,& ]+$");
    var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
    if (regex.test(str)) {
        return true;
    }
     e.preventDefault();
    return false;

});

$(document).on("keypress",".only_allow_digit_and_dot",function(e)
{
    var regex  = new RegExp("^[0-9.]+$");
    var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
    if (regex.test(str)) {
        return true;
    }
    e.preventDefault();
    return false;

});



$(document).on("keypress",".only_allow_digit",function(e)
{
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

