/* Add More Fileds For Address Details Start Here */
function add_address(id="",text=""){
  var address_details_validation_count=address_details_validation();
  if(address_details_validation_count == 0){
  var address='';
  address+='<div class="form-row address_div">\
   <div class="col-md-7">\
                  <div class="form-group row">\
                  <div class="col-md-7">\
                  <h3 class="address_label"></h3>\
                  </div>\
                  <div class="col-md-4">\
                  <h3 class="address_delete_label"><label class="btn btn-danger remove_new_address"> Delete </label></h3>\
                      </div>\
                  </div>\
                  </div>\
            <div class="col-md-6">\
          <div class="form-group row">\
            <label for="validationCustom01" class="col-sm-4 col-form-label">Address Type <span class="mandatory">*</span></label>\
            <div class="col-sm-8">\
              <select class="js-example-basic-multiple col-12 form-control custom-select address_type_id required_for_valid required_for_address_valid" error-data="Enter valid Address Type" name="address_type_id[]">\
                <option value="">Choose Address Type</option>\
                '+ $(".address_type_id_div").html() +'</select>\
             <div class="invalid-feedback">\
                Enter valid Address Type\
              </div>\
            </div>\
          </div>\
        </div>\
  <div class="col-md-6">\
          <div class="form-group row">\
            <label for="validationCustom01" class="col-sm-4 col-form-label">Address Line 1 <span class="mandatory">*</span></label>\
            <div class="col-sm-8">\
              <input type="text" class="form-control address_line_1 required_for_valid required_for_address_valid" error-data="Enter valid Address" placeholder="Address Line 1" name="address_line_1[]" value="" >\
             <div class="invalid-feedback">\
              Enter valid Address\
              </div>\
            </div>\
          </div>\
        </div>\
<div class="col-md-6">\
          <div class="form-group row">\
            <label for="validationCustom01" class="col-sm-4 col-form-label">Address Line 2 </label>\
            <div class="col-sm-8">\
              <input type="text" class="form-control address_line_2" placeholder="Address Line 2" name="address_line_2[]" value="">\
              <div class="invalid-feedback">\
              Enter valid Address\
              </div>\
            </div>\
          </div>\
        </div>\
<div class="col-md-6">\
          <div class="form-group row">\
            <label for="land_mark" class="col-sm-4 col-form-label">Land Mark </label>\
            <div class="col-sm-8">\
              <input type="text" class="form-control land_mark" placeholder="Land Mark" name="land_mark[]" value="">\
             <div class="invalid-feedback">\
              Enter valid Land Mark\
              </div>\
            </div>\
          </div>\
        </div>\
<div class="col-md-6">\
          <div class="form-group row">\
            <label for="validationCustom01" class="col-sm-4 col-form-label">State <span class="mandatory">*</span></label>\
            <div class="col-sm-8">\
              <select class="js-example-basic-multiple col-12 form-control custom-select state_id required_for_valid required_for_address_valid" error-data="Enter valid State" name="state_id[]" >\
                <option value="">Choose State</option>\
              '+ $(".state_id_div").html() +'</select>\
            <div class="invalid-feedback">\
                Enter valid State \
              </div>\
            </div>\
          </div>\
        </div>\
<div class="col-md-6">\
          <div class="form-group row">\
            <label for="validationCustom01" class="col-sm-4 col-form-label">District </label>\
            <div class="col-sm-8">\
              <select class="js-example-basic-multiple col-12 form-control custom-select district_id" name="district_id[]">\
                <option value="">Choose District</option>\
               </select>\
               <div class="invalid-feedback">\
                Enter valid District\
              </div>\
            </div>\
          </div>\
        </div>\
         <div class="col-md-6">\
          <div class="form-group row">\
            <label for="validationCustom01" class="col-sm-4 col-form-label">City </label>\
            <div class="col-sm-8">\
              <select class="js-example-basic-multiple col-12 form-control custom-select city_id" name="city_id[]" >\
                <option value="">Choose City</option>\
              </select>\
             <div class="invalid-feedback">\
                Enter valid City\
              </div>\
            </div>\
          </div>\
        </div>\
<div class="col-md-6">\
          <div class="form-group row">\
            <label for="land_mark" class="col-sm-4 col-form-label">Postal Code <span class="mandatory">*</span></label>\
            <div class="col-sm-8">\
              <input type="text" class="form-control postal_code required_for_valid required_for_address_valid only_allow_digit" error-data="Enter valid Postal Code" placeholder="Postal Code" name="postal_code[]" value="" >\
            <div class="invalid-feedback">\
                Enter valid Postal Code\
              </div>\
            </div>\
          </div>\
        </div>\
        </div><hr>';
     $(".common_address_div").append(address);
        address_lable_count();
        $("select").select2();
  }
}


function address_lable_count(){
  $(".address_label").each(function(key,index){
$(this).html("Address Details - " + (key+1));
});
}

$(document).on("click",".remove_new_address",function(){
   var $tr=$(this).closest(".address_div");
   if($(".remove_new_address").length >1){
    $(this).closest(".address_div").remove();
    address_lable_count();
   }else{
     alert("Atleast One Row Present");
   }
  
  });

  $(document).on("click",".add_address",function(){
    add_address();
    });  


/* Add More Fileds For Bank Details End Here */

