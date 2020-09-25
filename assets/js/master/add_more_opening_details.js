var i =1;
function openings_add()
{
	var opening_details = "";

opening_details+= '<div class="row mb-3 opening_row">\
                     <div class="col-md-2">\
                  <!-- <div class="form-group row"> -->\
                     <label for="validationCustom01" class="">Batch No</label>\
                     <!-- <div class="col-sm-8"> -->\
                       <input type="text" placeholder="Batch No" name="batch_no[]" class="form-control" >\
                     <!-- /div>\
                  </div> -->\
               </div>\
                  <div class="col-md-2">\
                  <!-- <div class="form-group row"> -->\
                     <label for="validationCustom01" class="">Opening Quantity<span class="mandatory">*</span></label>\
                     <!-- <div class="col-sm-8"> -->\
                       <input type="text" required="" placeholder="Opening Quantity" name="quantity[]" class="form-control mandatory" >\
                     <!-- </div> -->\
                     <span class="mandatory"> </span>\
                     <div class="invalid-feedback">\
                           Enter valid Quantity\
                     </div>\
                  <!-- </div> -->\
               </div>\
                                 <div class="col-md-1">\
                  <!-- <div class="form-group row"> -->\
                     <label for="validationCustom01" class="">Rate</label>\
                     <!-- <div class="col-sm-8"> -->\
                       <input type="text" placeholder="Rate" name="rate[]" class="form-control" >\
                     <!-- /div>\
                  </div> -->\
               </div>\
                                 <div class="col-md-2">\
                  <!-- <div class="form-group row"> -->\
                     <label for="validationCustom01" class="">Amount</label>\
                     <!-- <div class="col-sm-8"> -->\
                       <input type="text" name="amount[]" placeholder="Amount" class="form-control" >\
                     <!-- </div>\
                     \
                  </div> -->\
               </div>\
                                 <div class="col-md-2">\
                  <!-- <div class="form-group row"> -->\
                     <label for="validationCustom01" class="">Applicable Date</label>\
                     <!-- <div class="col-sm-8"> -->\
                       <input type="date" name="applicable_date[]" class="form-control" >\
                     <!-- /div>\
                  </div> -->\
               </div>\
               <div class="col-md-1">\
                  <!-- <div class="form-group row"> -->\
                     <label for="validationCustom01" class="">W/B</label>\
                     <!-- <div class="col-sm-8"> -->\
                       <select class="form-control" name="black_or_white[]">\
                          <option value="1">W</option>\
                          <option value="0">B</option>\
                       </select>\
                     <!-- /div>\
                  </div> -->\
               </div>\
               <div class="col-md-2 mt-4">\
                  <input type="button" id="add_opening" onclick="openings_add()" class="btn btn-success mb-3" name="" value="+">\
                  <input type="button" id="remove_opening" class="btn btn-danger mb-3" name="" value="-">\
               </div>\
            </div>';

$('.openings').append(opening_details);
i++;
$('#opening_cnt').val(i);
}

$(document).on('click','#remove_opening',function (){

	var count = $('.opening_row').length;
	if(count == 1)
	{
		alert('Atleast One Row Present!');
	}
	else
	{
		$(this).closest($('.opening_row')).remove();
		$('#opening_cnt').val(--i);
	}


});

function openings_remove() 
{
	
	
}
            