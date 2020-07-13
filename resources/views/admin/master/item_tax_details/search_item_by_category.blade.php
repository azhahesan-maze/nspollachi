
@if (count($item_dets) >0)
    @foreach ($item_dets as $value)
        <tr>
            <td class="s_no"></td> 
            <td>
                <p> {{ $value->name }} </p>
                <input type="hidden" class="form-control item_id" name="item_id[]" value="{{ $value->id}}">
                <input type="hidden" class="form-control item_name" name="item_name[]" value="{{ $value->name}}">
            </td>
            @foreach($taxes as $key => $value)
            <td>
                <div class="col-sm-12">
                <input type="text" class="form-control {{ $value->name }}_id only_allow_digit_and_dot commons" name="{{$value->name}}_id[]" placeholder="{{ $value->name }}" value="" required>
                <input type="hidden" name="{{$value->name}}[]" id="{{$value->name}}" value="{{$value->id}}">
                  <div class="invalid-feedback">
                    Enter valid IGST
                  </div>
                </div>
              </td>
              @endforeach
              <td>
                      <div class="col-sm-12">
                       <input type="text" class="form-control valid_from" name="valid_from[]" placeholder="dd-mm-yyyy" value="" required>
                        <div class="invalid-feedback">
                          Enter valid Effective From Date
                        </div>
                      </div>
                    </td>
            <!-- <td>
                <div class="col-sm-12">
                <input type="text" class="form-control cgst only_allow_digit_and_dot" name="cgst[]" placeholder="CGST" value="" required>
                  <div class="invalid-feedback">
                    Enter valid CGST
                  </div>
                </div>
              </td>

          <td>
                    <div class="col-sm-12">
                    <input type="text" class="form-control sgst only_allow_digit_and_dot" name="sgst[]" placeholder="SGST" value="" required>
                      <div class="invalid-feedback">
                        Enter valid SGST
                      </div>
                    </div>
                  </td>

                  <td>
                      <div class="col-sm-12">
                       <input type="text" class="form-control valid_from" name="valid_from[]" placeholder="dd-mm-yyyy" value="" required>
                        <div class="invalid-feedback">
                          Enter valid Effective From Date
                        </div>
                      </div>
                    </td> -->
           <!--   <td>
                  <div class="form-group row">
                      <div class="col-sm-3">
                      <label class="btn btn-success add_more">+</label>
                      </div>
                      <div class="col-sm-3 mx-2">
                      <label class="btn btn-danger remove_row">-</label>
                        </div>
                    </div>
              </td> -->

        </tr>
    @endforeach
@else
<tr>
    <td colspan="7" style="text-align:center;font-weight:bold">No Data Found</td>
    
  </tr>

  <script type="text/javascript">
    
    $(document).on("change", ".commons", function() {

      var common=$(this).val();
   //newfun($(this).attr('id'),common);
   
   var tax_name = $(this).attr('class').split(' ')[1].slice(0,-3).toLowerCase();
   alert(tax_name);
   if(tax_name == 'igst')
   {
      //alert('hi');
    var gst_lower = $(this).attr('class').split(' ')[1].slice(0,-3).toLowerCase();
    var gst_upper = $(this).attr('class').split(' ')[1].slice(0,-3).toUpperCase();
    var gst=tax_name.substr(0,1).toUpperCase()+tax_name.substr(1);
    var igst_upper = $(this).closest("tr").find("."+gst_upper+"_id").val();
    var igst_lower = $(this).closest("tr").find("."+gst_lower+"_id").val();
    var igst = $(this).closest("tr").find("."+gst+"_id").val();
    var half_lower = parseFloat(igst_lower)/2;
    var half_upper = parseFloat(igst_upper)/2;
    var half = parseFloat(igst)/2;

    var lower_cgst = 'cgst'.toLowerCase();
    var upper_cgst = 'cgst'.toUpperCase();
    var name_cgst = lower_cgst.substr(0,1).toUpperCase()+lower_cgst.substr(1);

    var lower_sgst = 'sgst'.toLowerCase();
    var upper_sgst = 'sgst'.toUpperCase();
    var name_sgst = lower_sgst.substr(0,1).toUpperCase()+lower_sgst.substr(1);

    $(this).closest("tr").find("."+lower_cgst+"_id").val(half_lower);
    $(this).closest("tr").find("."+upper_cgst+"_id").val(half_upper);
    $(this).closest("tr").find("."+name_cgst+"_id").val(half);

    $(this).closest("tr").find("."+lower_sgst+"_id").val(half_lower);
    $(this).closest("tr").find("."+upper_sgst+"_id").val(half_upper);
    $(this).closest("tr").find("."+name_sgst+"_id").val(half);

   // calc_gst(half,half_upper,half_lower);
 }
   });
  </script>
  
@endif







