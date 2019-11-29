


/* Add More Fileds For Bank Details Start Here */
function add_bank_details(){
 var bank_details='<tr>\
      <td><span class="bank_s_no"> 1 </span></td>\
      <td>\
                          <div class="form-group row">\
                              <div class="col-sm-12">\
                                <select class="js-example-basic-multiple col-12 form-control custom-select bank_id required_for_valid" error-data="Enter valid Bank" name="bank_id[]" >\
                                  <option value="">Choose Bank</option>\
                                  '+ $(".bank_id_div").html() +'</select>\
                                <div class="invalid-feedback">\
                                  Enter valid Bank Name \
                                </div>\
                              </div>\
                            </div>\
                         </td>\
                         <td>\
                          <div class="form-group row">\
                              <div class="col-sm-12">\
                                <select class="js-example-basic-multiple col-12 form-control custom-select branch_id required_for_valid" error-data="Enter valid Branch Name" name="branch_id[]" >\
                                  <option value="">Choose Branch Name</option>\
                                 </select>\
                              <div class="invalid-feedback">\
                                  Enter valid Branch Name \
                                </div>\
                              </div>\
                            </div>\
                         </td>\
                         <td>\
                          <div class="form-group row">\
                            <div class="col-sm-12">\
                            <input type="text" class="form-control ifsc required_for_proof_valid" error-data="Enter valid Ifsc Code" readonly placeholder="IFSC Code" name="ifsc[]" value="" >\
                            <div class="invalid-feedback">\
                                Enter valid IFSC Code\
                              </div>\
                            </div>\
                          </div>\
                        </td>\
                        <td>\
                          <div class="form-group row">\
                              <div class="col-sm-12">\
                                <select class="js-example-basic-multiple col-12 form-control custom-select account_type_id " error-data="Enter valid Account Type" name="account_type_id[]" >\
                                  <option value="">Choose Account Type</option>\
                                  '+ $(".account_type_id_div").html() +'</select>\
                              <div class="invalid-feedback">\
                                  Enter valid Account Type \
                                </div>\
                              </div>\
                            </div>\
                         </td>\
                         <td>\
                          <div class="form-group row">\
                            <div class="col-sm-12">\
                            <input type="text" class="form-control account_holder_name required_for_proof_valid" error-data="Enter valid Account Holder Name" placeholder="Account Holder Name" name="account_holder_name[]" value="" >\
                             <div class="invalid-feedback">\
                                Enter valid Account Holder Name\
                              </div>\
                            </div>\
                          </div>\
                        </td>\
                        <td>\
                          <div class="form-group row">\
                            <div class="col-sm-12">\
                            <input type="text" class="form-control account_no required_for_proof_valid" error-data="Enter valid Account No"  placeholder="Account No" name="account_no[]" value="" >\
                               <div class="invalid-feedback">\
                                Enter valid Account No\
                              </div>\
                            </div>\
                          </div>\
                        </td>\
                        <td>\
                                  <div class="form-group row">\
                                      <div class="col-sm-3">\
                                      <label class="btn btn-success add_bank_details">+</label>\
                                      </div>\
                                      <div class="col-sm-3 mx-2">\
                                        <label class="btn btn-danger remove_bank_details">-</label>\
                                        </div>\
                                    </div>\
                              </td>\
                         </tr>';
    $(".append_bank_details").append(bank_details);
    $("select").select2();
  }

 
  function bank_details_sno(){
    $(".bank_s_no").each(function(key,index){
        $(this).html((key+1));
      });
  }

  $(document).on("click",".add_bank_details",function(){
    var append=add_bank_details();
    bank_details_sno();
});

$(document).on("click",".remove_bank_details",function(){
  if($(".remove_bank_details").length > 1){
    $(this).closest("tr").remove();
    bank_details_sno();
  }else{
    alert("Atleast One row present");
  }
});
/* Add More Fileds For Bank Details End Here */




