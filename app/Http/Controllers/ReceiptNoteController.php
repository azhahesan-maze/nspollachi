<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Estimation;
use App\Models\Estimation_Item;
use App\Models\Estimation_Expense;
use App\Models\Supplier;
use App\Models\Item;
use App\Models\Agent;
use App\Models\Brand;
use App\Models\AddressDetails;
use App\Models\ItemTaxDetails;
use App\Models\ItemBracodeDetails;
use App\Models\ExpenseType;
use Carbon\Carbon;
use App\Models\ReceiptNote; 
use App\Models\ReceiptNoteItem;
use App\Models\ReceiptNoteExpense;
use App\Models\Purchase_Order;
use App\Models\PurchaseOrderItem;
use App\Models\PurchaseOrderExpense;
use App\Models\PurchaseEntry;
use App\Models\PurchaseEntryItem;
use App\Models\PurchaseEntryExpense;
use Illuminate\Support\Facades\Redirect;


class ReceiptNoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $receipt_note = ReceiptNote::all();
        return view('admin.receipt_note.view',compact('receipt_note'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $date = date('Y-m-d');
        $categories = Category::all();
        $supplier = Supplier::all();
        $item = Item::all();
        $agent = Agent::all();
        $brand = Brand::all();
        $expense_type = ExpenseType::all();
        $estimation = Estimation::all();
        $purchaseorder = Purchase_Order::all();
        

        $voucher_num=ReceiptNote::orderBy('rn_no','DESC')
                           ->select('rn_no')
                           ->first();

         if ($voucher_num == null) 
         {
             $voucher_no=1;

                             
         }                  
         else
         {
             $current_voucher_num=$voucher_num->rn_no;
             $voucher_no=$current_voucher_num+1;
        
         
         }

        return view('admin.receipt_note.add',compact('date','categories','voucher_no','supplier','item','agent','brand','expense_type','estimation','purchaseorder'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rn_no=ReceiptNote::orderBy('rn_no','DESC')
                           ->select('rn_no')
                           ->first();

         if ($rn_no == null) 
         {
             $voucher_no=1;

                             
         }                  
         else
         {
             $current_voucher_num=$rn_no->rn_no;
             $voucher_no=$current_voucher_num+1;
        
         }
         $voucher_date = $request->voucher_date;
         $estimation_date = $request->estimation_date;


         $receipt_note = new ReceiptNote();

         $receipt_note->rn_no = $voucher_no;
         $receipt_note->rn_date = $voucher_date;
         $receipt_note->po_no = $request->po_no;
         $receipt_note->po_date = $request->po_date;
         $receipt_note->supplier_id = $request->supplier_id;
         $receipt_note->overall_discount = $request->overall_discount;
         $receipt_note->total_net_value = $request->total_price;
         $receipt_note->round_off = $request->round_off;

         $receipt_note->save();

         $items_count = $request->counts;
         $expense_count = $request->expense_count;

         for($i=0;$i<$items_count;$i++)

        {
            $receipt_note_items = new ReceiptNoteItem();

            $receipt_note_items->rn_no = $voucher_no;
            $receipt_note_items->rn_date = $voucher_date;
            $receipt_note_items->po_no = $request->po_no;
            $receipt_note_items->po_date = $request->po_date;
            $receipt_note_items->item_sno = $request->invoice_sno[$i];
            $receipt_note_items->item_id = $request->item_code[$i];
            $receipt_note_items->mrp = $request->mrp[$i];
            $receipt_note_items->gst = $request->tax_rate[$i];
            $receipt_note_items->rate_exclusive_tax = $request->exclusive[$i];
            $receipt_note_items->rate_inclusive_tax = $request->inclusive[$i];
            $receipt_note_items->qty = $request->quantity[$i];
            $receipt_note_items->uom_id = $request->uom[$i];
            $receipt_note_items->discount = $request->discount[$i];

            $receipt_note_items->save();
        }
         


         for($j=0;$j<$expense_count;$j++)

        {
            if($expense_count >= 1 && $request->expense_type[$j] == '' && $request->expense_amount[$j] == '')
            {

            }
            else
            {
                $receipt_note_expense = new ReceiptNoteExpense();

                $receipt_note_expense->rn_no = $voucher_no;
                $receipt_note_expense->rn_date = $voucher_date;
                $receipt_note_expense->po_no = $request->po_no;
                $receipt_note_expense->po_date = $request->po_date;
                $receipt_note_expense->expense_type = $request->expense_type[$j];
                $receipt_note_expense->expense_amount = $request->expense_amount[$j];

                $receipt_note_expense->save();
            }
           
            
        }

        return Redirect::back()->with('success', 'Saved Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $receipt_note = ReceiptNote::where('rn_no',$id)->first();
        $receipt_note_items = ReceiptNoteItem::where('rn_no',$id)->get();
        $receipt_note_expense = ReceiptNoteExpense::where('rn_no',$id)->get();

        //echo "<pre>"; print_r($receipt_note_items);exit;

        $item_row_count = count($receipt_note_items);
        $expense_row_count = count($receipt_note_expense);


        if(isset($receipt_note->supplier->name) && !empty($receipt_note->supplier->name))
        {
            $supplier_id = $receipt_note->supplier->id;

            $address_details = AddressDetails::where('address_ref_id',$supplier_id)
                                            ->where('address_table','=','Supplier')
                                            ->first();
                                            

       $count=0;

       $address="";
      
        if(isset($address_details->address_line_1) && !empty($address_details->address_line_1))
          {
            $address.=$address_details->address_line_1.", \n";
            
          }

          if(isset($address_details->address_line_2) && !empty($address_details->address_line_2)){
            $address.=$address_details->address_line_2.",  \n ";
            
          }


         if(isset($address_details->city->name)  || isset($address_details->district->name)){

            if(!empty($address_details->city->name)){
                $address.=$address_details->city->name." ,";
               
            }
           

            if(!empty($address_details->district->name)){
                $address.=$address_details->district->name." ,";
                $data[] = $address_details->district->id;
            }
            

            $address.="\n";

         }



         if(isset($address_details->state->name)  && !empty($address_details->state->name)){
             $address.=$address_details->state->name." -";
             
        if(isset($address_details->postal_code) && !empty($address_details->postal_code)){
            // $address.=" - ";
            $address.=$address_details->postal_code.',';
            
        }
             
             $address.="\n";
             $address.="GST Number :".$address_details->supplier->gst_no;
         }
                                          
        }
        else
        {
            $address = '';
        }   
        $item_amount_sum = 0;
        $item_net_value_sum = 0;
        $item_gst_rs_sum = 0;
        $item_discount_sum = 0;
        foreach($receipt_note_items as $key => $value)  
        {
            $item_amount[] = $value->qty * $value->rate_exclusive_tax;
            $item_gst_rs[] = $item_amount[$key] * $value->gst / 100;
            $item_net_value[] = $item_amount[$key] + $item_gst_rs[$key] - $value->discount;


            $item_amount_sum = $item_amount_sum + $item_amount[$key];         
            $item_net_value_sum = $item_net_value_sum + $item_net_value[$key];
            $item_gst_rs_sum = $item_gst_rs_sum + $item_gst_rs[$key];
            $item_discount_sum = $item_discount_sum + $value->discount;

            $item_data = ReceiptNoteItem::where('item_id',$value->item_id)
                                    ->orderBy('rn_date','DESC')
                                    ->first();

            $amount = $item_data->qty * $item_data->rate_exclusive_tax;
            $gst_rs = $amount * $item_data->gst / 100;
            $net_value[] = $amount + $gst_rs - $item_data->discount;

        }     

        $item_sgst = $item_gst_rs_sum/2;
        $item_cgst = $item_gst_rs_sum/2;    

        return view('admin.receipt_note.show',compact('receipt_note','receipt_note_items','receipt_note_expense','address','net_value','item_gst_rs','item_amount','item_net_value','item_amount_sum','item_net_value_sum','item_gst_rs_sum','item_discount_sum','item_sgst','item_cgst'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $date = date('Y-m-d');
        $categories = Category::all();
        $supplier = Supplier::all();
        $item = Item::all();
        $agent = Agent::all();
        $brand = Brand::all();
        $expense_type = ExpenseType::all();
        $estimation = Estimation::all();
        $purchaseorder = Purchase_Order::all();

        $receipt_note = ReceiptNote::where('rn_no',$id)->first();
        $receipt_note_items = ReceiptNoteItem::where('rn_no',$id)->get();
        $receipt_note_expense = ReceiptNoteExpense::where('rn_no',$id)->get();

        $item_row_count = count($receipt_note_items);
        $expense_row_count = count($receipt_note_expense);


        if(isset($receipt_note->supplier->name) && !empty($receipt_note->supplier->name))
        {
            $supplier_id = $receipt_note->supplier->id;

            $address_details = AddressDetails::where('address_ref_id',$supplier_id)
                                            ->where('address_table','=','Supplier')
                                            ->first();
                                            

       $count=0;

       $address="";
      
        if(isset($address_details->address_line_1) && !empty($address_details->address_line_1))
          {
            $address.=$address_details->address_line_1.", \n";
            
          }

          if(isset($address_details->address_line_2) && !empty($address_details->address_line_2)){
            $address.=$address_details->address_line_2.",  \n ";
            
          }


         if(isset($address_details->city->name)  || isset($address_details->district->name)){

            if(!empty($address_details->city->name)){
                $address.=$address_details->city->name." ,";
               
            }
           

            if(!empty($address_details->district->name)){
                $address.=$address_details->district->name." ,";
                $data[] = $address_details->district->id;
            }
            

            $address.="\n";

         }



         if(isset($address_details->state->name)  && !empty($address_details->state->name)){
             $address.=$address_details->state->name." -";
             
        if(isset($address_details->postal_code) && !empty($address_details->postal_code)){
            // $address.=" - ";
            $address.=$address_details->postal_code.',';
            
        }
             
             $address.="\n";
             $address.="GST Number :".$address_details->supplier->gst_no;
         }
                                          
        }
        else
        {
            $address = '';
        }   
        $item_amount_sum = 0;
        $item_net_value_sum = 0;
        $item_gst_rs_sum = 0;
        $item_discount_sum = 0;
        foreach($receipt_note_items as $key => $value)  
        {
            $item_amount[] = $value->qty * $value->rate_exclusive_tax;
            $item_gst_rs[] = $item_amount[$key] * $value->gst / 100;
            $item_net_value[] = $item_amount[$key] + $item_gst_rs[$key] - $value->discount;


            $item_amount_sum = $item_amount_sum + $item_amount[$key];         
            $item_net_value_sum = $item_net_value_sum + $item_net_value[$key];
            $item_gst_rs_sum = $item_gst_rs_sum + $item_gst_rs[$key];
            $item_discount_sum = $item_discount_sum + $value->discount;

            $item_data = ReceiptNoteItem::where('item_id',$value->item_id)
                                    ->orderBy('rn_date','DESC')
                                    ->first();

            $amount = $item_data->qty * $item_data->rate_exclusive_tax;
            $gst_rs = $amount * $item_data->gst / 100;
            $net_value[] = $amount + $gst_rs - $item_data->discount;

        }     

        $item_sgst = $item_gst_rs_sum/2;
        $item_cgst = $item_gst_rs_sum/2;    

        return view('admin.receipt_note.edit',compact('date','categories','supplier','agent','brand','expense_type','item','estimation','purchaseorder','receipt_note','receipt_note_items','receipt_note_expense','address','net_value','item_gst_rs','item_amount','item_net_value','item_amount_sum','item_net_value_sum','item_gst_rs_sum','item_discount_sum','item_sgst','item_cgst','expense_row_count','item_row_count'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $receipt_note_data = ReceiptNote::where('rn_no',$id);
        $receipt_note_data->delete();

        $receipt_note_item_data = ReceiptNoteItem::where('rn_no',$id);
        $receipt_note_item_data->delete();

        $receipt_note_expense_data = ReceiptNoteExpense::where('rn_no',$id);
        $receipt_note_expense_data->delete();

        $voucher_date = $request->voucher_date;
        $voucher_no = $request->voucher_no;

         $receipt_note = new ReceiptNote();

         $receipt_note->rn_no = $voucher_no;
         $receipt_note->rn_date = $voucher_date;
         $receipt_note->po_no = $request->po_no;
         $receipt_note->po_date = $request->po_date;
         $receipt_note->supplier_id = $request->supplier_id;
         $receipt_note->overall_discount = $request->overall_discount;
         $receipt_note->total_net_value = $request->total_price;
         $receipt_note->round_off = $request->round_off;

         $receipt_note->save();

         $items_count = $request->counts;
         $expense_count = $request->expense_count;
         if($expense_count == 0)
         {
            $expense_count =1;
         }

         for($i=0;$i<$items_count;$i++)

        {
            $receipt_note_items = new ReceiptNoteItem();

            $receipt_note_items->rn_no = $voucher_no;
            $receipt_note_items->rn_date = $voucher_date;
            $receipt_note_items->po_no = $request->po_no;
            $receipt_note_items->po_date = $request->po_date;
            $receipt_note_items->item_sno = $request->invoice_sno[$i];
            $receipt_note_items->item_id = $request->item_code[$i];
            $receipt_note_items->mrp = $request->mrp[$i];
            $receipt_note_items->gst = $request->tax_rate[$i];
            $receipt_note_items->rate_exclusive_tax = $request->exclusive[$i];
            $receipt_note_items->rate_inclusive_tax = $request->inclusive[$i];
            $receipt_note_items->qty = $request->quantity[$i];
            $receipt_note_items->uom_id = $request->uom[$i];
            $receipt_note_items->discount = $request->discount[$i];

            $receipt_note_items->save();
        }
         


         for($j=0;$j<$expense_count;$j++)

        {
            if($expense_count >= 1 && $request->expense_type[$j] == '' && $request->expense_amount[$j] == '')
            {

            }
            else
            {
                $receipt_note_expense = new ReceiptNoteExpense();

                $receipt_note_expense->rn_no = $voucher_no;
                $receipt_note_expense->rn_date = $voucher_date;
                $receipt_note_expense->po_no = $request->po_no;
                $receipt_note_expense->po_date = $request->po_date;
                $receipt_note_expense->expense_type = $request->expense_type[$j];
                $receipt_note_expense->expense_amount = $request->expense_amount[$j];

                $receipt_note_expense->save();
            }
           
            
        }
        return Redirect::back()->with('success', 'Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $receipt_note_data = ReceiptNote::where('rn_no',$id);
        $receipt_note_item_data = ReceiptNoteItem::where('rn_no',$id);
        $receipt_note_expense_data = ReceiptNoteExpense::where('rn_no',$id);
        
        if($receipt_note_data)
        {
            $receipt_note_data->delete();
        }
         if($receipt_note_item_data)
         {
            $receipt_note_item_data->delete();
         }

         if($receipt_note_expense_data)
         {
            $receipt_note_expense_data->delete();
         }   
        
        return Redirect::back()->with('success', 'Deleted Successfully');
    }


    public function address_details(Request $request)
    {
       $supplier_id = $request->supplier_id;

       $getdata = AddressDetails::
       join('suppliers','suppliers.id','=','address_details.address_ref_id')
       ->where('address_details.address_table','=','Supplier')
       ->where('address_details.address_ref_id','=',$supplier_id)
       ->first();

      
$count=0;

       $address="";
      
          if(isset($getdata->address_line_1) && !empty($getdata->address_line_1)){
            $address.=$getdata->address_line_1.", \n";
            
          }

          if(isset($getdata->address_line_2) && !empty($getdata->address_line_2)){
            $address.=$getdata->address_line_2.",  \n ";
            
          }


         if(isset($getdata->city->name)  || isset($getdata->district->name)){

            if(!empty($getdata->city->name)){
                $address.=$getdata->city->name." ,";
               
            }
           

            if(!empty($getdata->district->name)){
                $address.=$getdata->district->name." ,";
                $data[] = $getdata->district->id;
            }
            

            $address.="\n";

         }



         if(isset($getdata->state->name)  && !empty($getdata->state->name)){
             $address.=$getdata->state->name." -";
             
        if(isset($getdata->postal_code) && !empty($getdata->postal_code)){
            // $address.=" - ";
            $address.=$getdata->postal_code.',';
            
        }
             
             $address.="\n";
         }
         $address.="GST Number :".$getdata->gst_no;



   return $address;   
        
    }


    public function getdata(Request $request,$id)
    {
        $id=$request->id;
        $items=Item::where('id',$id)->first();

        $data[]=Item::join('uoms','uoms.id','=','items.uom_id')
                    ->where('items.id','=',$id)
                    ->select('items.id as item_id','items.name as item_name','mrp','hsn','code','uoms.id as uom_id','uoms.name as uom_name','items.ptc')
                    ->first();

        if(isset($items->category->gst_no) && $items->category->gst_no != '' && $items->category->gst_no != 0)
        {
            
            $data[] = array('igst' => $items->category->gst_no);
        }  
        else
        {
            $data[] =ItemTaxDetails::where('item_id','=',$id)
                                ->orderBy('valid_from','DESC')
                                ->whereDate('valid_from', '<=', Carbon::now())
                                ->select('igst')
                                ->first();
        }          
         
        $data[] =ItemBracodeDetails::where('item_id','=',$id)
                                    ->select('barcode')
                                    ->first();
        if($data[1]=='')  
        {
            $data[1]=0;
        } 
        else if($data[2]=='')  
        {
            $data[2]='';
        }  

        //return $items->item_type;

        if($items->item_type != 'Parent')
        {
        $item_id=$this->get_parent_item_id($id);
          //dd($item_id);
        $item_uom=item::with('uom')->whereIn('id',$item_id)->get();
          
        $uom=array();
        $count=0;
        foreach($item_uom as $value){
        if(isset($value->uom->name) && !empty($value->uom->name))
        {
            $count++;
            $uom[]=array('id'=>$value->uom->id,'name'=>$value->uom->name,'item_id'=>$value->id);
                //array_push($uom,array('id'=>$value->uom->id,'name'=>$value->uom->name));
        }

        }

        $result = array_unique($uom, SORT_REGULAR);

        $data[]=$result;                              
        return $data;
        }
        else
        {
        $item_id=$this->get_item_id($id);

        $item_uom=item::with('uom')->whereIn('id',$item_id)->get();
          
        $uom=array();
        $count=0;
        foreach($item_uom as $value){
        if(isset($value->uom->name) && !empty($value->uom->name))
        {
            $count++;
            $uom[]=array('id'=>$value->uom->id,'name'=>$value->uom->name,'item_id'=>$value->id);
                //array_push($uom,array('id'=>$value->uom->id,'name'=>$value->uom->name));
        }

        }

        $result = array_unique($uom, SORT_REGULAR);

        $data[]=$result;                              
        return $data;
    }
    }


    function child_category($array)
   {
       $output_array=[];
       foreach($array  as $value)
       {
           $result_array=[];
           $result_array['id']=$value->id;
           $output_array[]=$result_array;
             if(count($value->childCategories)>0)
             {
                $test=$this->child_category($value->childCategories);
                array_push($output_array,$test);
             }  
        }
           return $output_array;
   }

   function get_category_id($category_id)
   {
    $category=category::with('childCategories')->where('id',$category_id)->get();
    $output_array=[];
    foreach($category as $value)
    {
        $result_array=[];
        $result_array['id']=$value->id;
        $output_array[]=$result_array;
        if(count($value->childCategories)>0)
        {
            $result=$this->child_category($value->childCategories);
            array_push($output_array,$result);
        }  
    }

    $result=[];
    foreach ($output_array as $key => $value)
    {
        if (is_array($value))
        {
            $result = array_merge($result, array_flatten($value));
        } else
        {
            $result = array_merge($result, array($key => $value));
        }
    }
    //$result=implode("','", $result);
    //$result="'".$result."'";
    return $result;
   }

    public function change_items(Request $request,$id)
    {
        $categories=$request->categories;
        $category_id=$this->get_category_id($categories);
        $brand=$request->brand;
        $result="";
        $item=array();
        if($categories !="" && $brand == "no_val"){
             $item=Item::whereIn('category_id',$category_id)->get();
        }else if($categories !="" && $brand != "" && $brand != "no_val" ){
            $item=Item::whereIn('category_id',$category_id)->where('brand_id',$brand)->get();
        }
       
        foreach($item as $key=>$value){
            if($value->brand_id != 0)
            {
                $barnd_name=isset($value->brand->name) ? $value->brand->name : "";
            }
            else
            {
                $barnd_name='Not Applicable';
            }
            
            $category_name=isset($value->category->name) ? $value->category->name : "";
            $uom_id=isset($value->uom->id) ? $value->uom->id : "";
            $uom_name=isset($value->uom->name) ? $value->uom->name : "";

            $barcode="";
            if(count($value->item_barcode_details)>0){
                $barcode_array=[];
                foreach($value->item_barcode_details as $row){
                    $barcode_array[]=$row->barcode;
                }
                $barcode=implode(",",$barcode_array);
            }
             $result .='<tr class="row_category"><td><center><input type="radio" name="select" onclick="add_data('.$key.')"></center></td><td><input type="hidden" value="'.$value->id.'" class="append_item_id'.$key.'"><input type="hidden" value="'.$value->code.'" class="append_item_code'.$key.'"><font style="font-family: Times new roman;">'.$value->code.'</font></td><td><input type="hidden" value="'.$value->name.'" class="append_item_name'.$key.'"><font style="font-family: Times new roman;">'.$value->name.'</font></td><td><input type="hidden" value="'.$value->mrp.'" class="append_item_name'.$key.'"><font style="font-family: Times new roman;">'.$value->mrp.'</font></td><td><input type="hidden" value="'.$uom_id.'" class="append_item_name'.$key.'"><font style="font-family: Times new roman;">'.$uom_name.'</font></td><td><input type="hidden" value="'.$value->brand_id.'" class="append_item_brand_name'.$key.'"><font style="font-family: Times new roman;">'.$barnd_name .'</font></td><td><input type="hidden" value="'.$value->category_id.'" class="append_item_brand_name'.$key.'"><font style="font-family: Times new roman;">'.$category_name .'</font></td><td><input type="hidden" value="'.$barcode.'" class="append_item_brand_name'.$key.'"><font style="font-family: Times new roman;">'.$barcode.'</font></td></tr>';

             // <td><input type="hidden" value="'.$value->ptc.'" class="append_item_brand_name'.$key.'"><font style="font-family: Times new roman;">'.$value->ptc.'</font></td>
            }
         return $result;
        





        
        // if($brand != 'no_val')
        // {
        //     $items = Item::join('brands','brands.id','=','items.brand_id')
        //              ->join('categories','categories.id','=','items.category_id')
        //              ->where('items.category_id','=',$categories)
        //              ->where('items.brand_id','=',$brand)
        //              ->select('items.id as item_id','items.code as item_code','items.name as item_name','brands.id as brand_id','brands.name as brand_name','items.ptc','categories.id as categories_id','categories.name as category_name')
        //              ->get();

        // foreach ($items as $key => $value) {
        //      $item_id=$value->item_id;

        //      $data[] =ItemBracodeDetails::where('item_bracode_details.item_id','=',$item_id)
        //                                 ->select('barcode')
        //                                 ->get();
        //          }  

        //      $data[] = $items;
        // }
        // else
        // {
        //     $items = Item::join('categories','categories.id','=','items.category_id')
        //              ->where('items.category_id','=',$categories)
        //              ->select('items.id as item_id','items.code as item_code','items.name as item_name','items.brand_id','items.ptc','categories.id as categories_id','categories.name as category_name')
        //              ->get();

        //              $items_1 = Item::all();
        //             // ->select('items.id as item_id','items.code as item_code','items.name as item_name','items.brand_id','items.ptc','categories.id as categories_id','categories.name as category_name')
                    

        //              print_r($items_1); exit;


        // // foreach ($items as $key => $values) {
        // //                   if(isset($value->brand->name)  && !empty($value->brand->name)){
        // //      $data[]=$value->brand->name;
        // //     }
        // //              }             

        // foreach ($items as $key => $value) {
        //      $item_id=$value->item_id;

        //     //  if(isset($value->brand->name)  && !empty($value->brand->name)){
        //     //  $brand_name=$value->brand->name;
        //     // }
        //      $data[] =ItemBracodeDetails::where('item_bracode_details.item_id','=',$item_id)
        //                                 ->select('barcode')
        //                                 ->get();
        //         // $data[$key]=$brand_name;
        //          }  

        //      $data[] = $items;
        // }
        
          
                   

        //   return $data;

    }

    public function brand_filter(Request $request)
    {
        
        $brand=$request->brand;
        $result="";
        $item=array();
        $item=Item::where('brand_id',$brand)->get();

        foreach($item as $key=>$value){
            if($value->brand_id != 0)
            {
                $barnd_name=isset($value->brand->name) ? $value->brand->name : "";
            }
            else
            {
                $barnd_name='Not Applicable';
            }
            
            $category_name=isset($value->category->name) ? $value->category->name : "";
            $uom_id=isset($value->uom->id) ? $value->uom->id : "";
            $uom_name=isset($value->uom->name) ? $value->uom->name : "";

            $barcode="";
            if(count($value->item_barcode_details)>0){
                $barcode_array=[];
                foreach($value->item_barcode_details as $row){
                    $barcode_array[]=$row->barcode;
                }
                $barcode=implode(",",$barcode_array);
            }
             $result .='<tr class="row_brand"><td><center><input type="radio" name="select" onclick="add_data('.$key.')"></center></td><td><input type="hidden" value="'.$value->id.'" class="append_item_id'.$key.'"><input type="hidden" value="'.$value->code.'" class="append_item_code'.$key.'"><font style="font-family: Times new roman;">'.$value->code.'</font></td><td><input type="hidden" value="'.$value->name.'" class="append_item_name'.$key.'"><font style="font-family: Times new roman;">'.$value->name.'</font></td><td><input type="hidden" value="'.$value->mrp.'" class="append_item_name'.$key.'"><font style="font-family: Times new roman;">'.$value->mrp.'</font></td><td><input type="hidden" value="'.$uom_id.'" class="append_item_name'.$key.'"><font style="font-family: Times new roman;">'.$uom_name.'</font></td><td><input type="hidden" value="'.$value->brand_id.'" class="append_item_brand_name'.$key.'"><font style="font-family: Times new roman;">'.$barnd_name .'</font></td><td><input type="hidden" value="'.$value->category_id.'" class="append_item_brand_name'.$key.'"><font style="font-family: Times new roman;">'.$category_name .'</font></td><td><input type="hidden" value="'.$barcode.'" class="append_item_brand_name'.$key.'"><font style="font-family: Times new roman;">'.$barcode.'</font></td></tr>';

             // <td><input type="hidden" value="'.$value->ptc.'" class="append_item_brand_name'.$key.'"><font style="font-family: Times new roman;">'.$value->ptc.'</font></td>
            }
         return $result;
        
        // $items = Item::join('brands','brands.id','=','items.brand_id')
        //              ->join('categories','categories.id','=','items.category_id')
        //              ->where('items.brand_id','=',$brand)
        //              ->select('items.id as item_id','items.code as item_code','items.name as item_name','brands.id as brand_id','brands.name as brand_name','items.ptc','items.mrp','categories.id as categories_id','categories.name as category_name')
        //              ->get();

        // foreach ($items as $key => $value) 
        // {
        //      $item_id=$value->item_id;

        //      $data[] =ItemBracodeDetails::where('item_bracode_details.item_id','=',$item_id)
        //                                 ->select('barcode')
        //                                 ->get();
        // }  

        // $data[] = $items;      
        

        // return $data;
          

    }

    // function uom_selection($item_id)
    // {
    //     $uoms = Item::where('id',$item_id)->select('uom_for_repack_item','uom_id')->first();
    //     if($uoms->uom_for_repack_item == '')
    //                {
    //                 return $uoms;
    //                }
    //                else
    //                {
    //                 $parent_id=$uoms->id;
    //                 $uoms = Item::where('id',$parent_id)->select('uom_for_repack_item','uom_id')->first();
    //                 uom_selection($parent_id);
    //                }
    // }

    function parentItem($array)
   {
       $output_array=[];
       foreach($array  as $value)
       {
           $result_array=[];
           $result_array['id']=$value->id;
           $output_array[]=$result_array;
             if(count($value->parentItem)>0)
             {
                $test=$this->parentItem($value->parentItem);
                array_push($output_array,$test);
             }  
        }
           return $output_array;
   }

   function get_parent_item_id($item_id)
   {
    //return $item_id;

     $item=item::with('parentItem')->where('id',$item_id)->get();
   
    $output_array=[];
    foreach($item as $value)
    {
        $result_array=[];
        $result_array['id']=$value->id;
        $output_array[]=$result_array;
        if(count($value->parentItem)>0)
        {
            $result=$this->parentItem($value->parentItem);
            array_push($output_array,$result);
        } 

    }
$result=[];
    foreach ($output_array as $key => $value)
    {
        if (is_array($value))
        {
            $result = array_merge($result, array_flatten($value));
        } else
        {
            $result = array_merge($result, array($key => $value));
        }
    }

    //$result=implode("','", $result);
    //$result="'".$result."'";
    return $result;
}

    function childItem($array)
   {
       $output_array=[];
       foreach($array  as $value)
       {
           $result_array=[];
           $result_array['id']=$value->id;
           $output_array[]=$result_array;
             if(count($value->childItem)>0)
             {
                $test=$this->childItem($value->childItem);
                array_push($output_array,$test);
             }  
        }
           return $output_array;
   }

   function get_item_id($item_id)
   {

     $item=item::with('childItem')->where('id',$item_id)->get();
   
    $output_array=[];
    foreach($item as $value)
    {
        $result_array=[];
        $result_array['id']=$value->id;
        $output_array[]=$result_array;
        if(count($value->childItem)>0)
        {
            $result=$this->childItem($value->childItem);
            $result_val=$this->parentItem($value->childItem);
            array_push($output_array,$result,$result_val);
        } 

    }

    $result=[];
    foreach ($output_array as $key => $value)
    {
        if (is_array($value))
        {
            $result = array_merge($result, array_flatten($value));
        } else
        {
            $result = array_merge($result, array($key => $value));
        }
    }

    //$result=implode("','", $result);
    //$result="'".$result."'";
    return $result;
   }

    public function getdata_item(Request $request,$id)
    {
        $id=$request->id;

        $item = Item::join('item_bracode_details','item_bracode_details.item_id','=','items.id')
                    ->where('items.code','=',$id)
                    // ->orWhere('items.ptc','=',$id)
                    ->orWhere('item_bracode_details.barcode','=',$id)
                    ->select('*','items.id as item_id')
                    ->get();

                    $cnt=count($item);
                    foreach ($item as $key => $value) 
                    {
                        $item_id= $value->item_id;
                    }
                   
                   // $data[] = $this->uom_selection($item_id);
                   
                   

        $data[]=Item::join('uoms','uoms.id','=','items.uom_id')
                    ->join('item_bracode_details','item_bracode_details.item_id','=','items.id')
                    ->where('items.code','=',$id)
                    // ->orWhere('items.ptc','=',$id)
                    ->orWhere('item_bracode_details.barcode','=',$id)
                    ->select('items.id as item_id','items.name as item_name','mrp','hsn','code','uoms.id as uom_id','uoms.name as uom_name') 
                    ->first();
                    

        $data[] =ItemTaxDetails::where('item_id','=',$item_id)
                                ->orderBy('valid_from','DESC')
                                ->whereDate('valid_from', '<=', Carbon::now())
                                ->select('igst')
                                ->first();

        if($data[1]=='')  
        {
            $data[1]=0;
        }         


        $item_id=$this->get_item_id($item_id);
          //dd($item_id);
        $item_uom=item::with('uom')->whereIn('id',$item_id)->get();
          
        $uom=array();
        $count=0;
        foreach($item_uom as $value){
        if(isset($value->uom->name) && !empty($value->uom->name))
        {
            $count++;
            $uom[]=array('id'=>$value->uom->id,'name'=>$value->uom->name,'item_code'=>$value->code);
                //array_push($uom,array('id'=>$value->uom->id,'name'=>$value->uom->name));
        }

        }

        $result = array_unique($uom, SORT_REGULAR);

        $data[]=$result;
        $data[]=$cnt;
                                
        return $data;
    }

    public function same_items(Request $request,$id)
    {

        $id = $request->id;
              $result="";  
        $item = Item::join('item_bracode_details','item_bracode_details.item_id','=','items.id')
                    ->where('items.code','=',$id)
                    // ->orWhere('items.ptc','=',$id)
                    ->orWhere('item_bracode_details.barcode','=',$id)
                    ->select('*','item_bracode_details.barcode as item_barcode','items.id as item_id','items.code as item_code','items.name as item_name','mrp','hsn','ptc','code')
                    //->groupBy('item_bracode_details.item_id')
                    ->get();
                    //return count($item);
        foreach($item as $key=>$value){

            if($value->brand_id != 0)
            {
                $barnd_name=isset($value->brand->name) ? $value->brand->name : "";
            }
            else
            {
                $barnd_name='Not Applicable';
            }
            
            $category_name=isset($value->category->name) ? $value->category->name : "";
            $uom_id=isset($value->uom->id) ? $value->uom->id : "";
            $uom_name=isset($value->uom->name) ? $value->uom->name : "";
            

            $result .='<tr class="row_category"><td><center><input type="radio" name="select" onclick="add_append_data('.$key.')"></center></td><td><input type="hidden" value="'.$value->item_id.'" class="item_id'.$key.'"><input type="hidden" value="1" class="append_value'.$key.'"><input type="hidden" value="'.$value->item_code.'" class="append_item_code'.$key.'"><font style="font-family: Times new roman;">'.$value->item_code.'</font></td><td><input type="hidden" value="'.$value->item_name.'" class="append_item_name'.$key.'"><font style="font-family: Times new roman;">'.$value->item_name.'</font></td><td><input type="hidden" value="'.$value->mrp.'" class="append_item_name'.$key.'"><font style="font-family: Times new roman;">'.$value->mrp.'</font></td><td><input type="hidden" value="'.$uom_id.'" class="append_item_name'.$key.'"><font style="font-family: Times new roman;">'.$uom_name.'</font></td><td><input type="hidden" value="'.$value->brand_id.'" class="append_item_brand_name'.$key.'"><font style="font-family: Times new roman;">'.$barnd_name.'</font></td><td><input type="hidden" value="'.$value->category_id.'" class="append_item_brand_name'.$key.'"><font style="font-family: Times new roman;">'.$category_name.'</font></td><td><input type="hidden" value="'.$value->item_barcode.'" class="append_item_brand_name'.$key.'"><font style="font-family: Times new roman;">'.$value->item_barcode.'</font></td></tr>'; 

            // <td><input type="hidden" value="'.$value->ptc.'" class="append_item_brand_name'.$key.'"><font style="font-family: Times new roman;">'.$value->ptc.'</font></td>
            }        

        return $result;

    }
    
    public function item_details($id)
    {

        $item_details = ReceiptNoteItem::where('rn_no',$id)->get();
        foreach ($item_details as $key => $value) 
        {
            $amount[] = $value->qty * $value->rate_exclusive_tax;
            $gst_rs[] = $amount[$key] * $value->gst / 100;
            $net_value[] = $amount[$key] + $gst_rs[$key] - $value->discount;
        }
    return view('admin.receipt_note.item_details',compact('item_details','gst_rs','amount','net_value'));
    }

    public function expense_details($id)
    {
        $expense_details = ReceiptNoteExpense::where('rn_no',$id)->get();
        return view('admin.receipt_note.expense_details',compact('expense_details'));
    }

    public function last_purchase_rate(Request $request)
    {
        $id = $request->id;

        $item_data = ReceiptNoteItem::where('item_id',$id)
                                    ->orderBy('rn_date','DESC')
                                    ->first();

        $amount = $item_data->qty * $item_data->rate_exclusive_tax;
        $gst_rs = $amount * $item_data->gst / 100;
        $net_value = $amount + $gst_rs - $item_data->discount; 

        return $net_value;                          
    }


    public function po_details(Request $request)
    {
        $po_no = $request->po_no;
        $date = date('Y-m-d');
        $categories = Category::all();
        $supplier = Supplier::all();
        $item = Item::all();
        $agent = Agent::all();
        $brand = Brand::all();
        $expense_type = ExpenseType::all();
        $estimation =Estimation::all();

        // $voucher_num=ReceiptNote::orderBy('rn_no','DESC')
        //                    ->select('rn_no')
        //                    ->first();

        //  if ($voucher_num == null) 
        //  {
        //      $voucher_no=1;

                             
        //  }                  
        //  else
        //  {
        //      $current_voucher_num=$voucher_num->o_no;
        //      $voucher_no=$current_voucher_num+1;
        
         
        //  }

        $purchaseorder = Purchase_Order::where('po_no',$po_no)->first();
        $purchaseorder_item = PurchaseOrderItem::where('po_no',$po_no)->get();
        $purchaseorder_expense = PurchaseOrderExpense::where('po_no',$po_no)->get();

        $round_off = $purchaseorder->round_off;
         $total_net_value = $purchaseorder->total_net_value;
         $purchase_type = $purchaseorder->purchase_type;
         $date_purchaseorder = $purchaseorder->po_date;
         $date_estimation = $purchaseorder->estimation_date;
         $estimation_no = $purchaseorder->estimation_no;

        $item_row_count = count($purchaseorder_item);
        $expense_row_count = count($purchaseorder_expense);


        
        $item_amount_sum = 0;
        $item_net_value_sum = 0;
        $item_gst_rs_sum = 0;
        $item_discount_sum = 0;

        $table_tbody="";
        $i=0;
        $status=0;
        foreach($purchaseorder_item as $key => $value)  
        {
            $status++;
            $i++;
            
            $item_amount = $value->qty * $value->rate_exclusive_tax;
            $item_gst_rs = $item_amount * $value->gst / 100;
            $item_net_value = $item_amount + $item_gst_rs - $value->discount;


            $item_data = PurchaseOrderItem::where('item_id',$value->item_id)
                                    ->orderBy('po_date','DESC')
                                    ->first();

            $amount = $item_data->qty * $item_data->rate_exclusive_tax;
            $gst_rs = $amount * $item_data->gst / 100;
            $net_value = $amount + $gst_rs - $item_data->discount;


            $table_tbody.='<tr id="row'.$i.'" class="'.$i.' tables"><td><span class="item_s_no"> 1 </span></td><td><div class="form-group row"><div class="col-sm-12"><input class="invoice_no'.$i.'" type="hidden" id="invoice'.$i.'" value="'.$value['item_sno'].'" name="invoice_sno[]"><font class="item_no'.$i.'">'.$value['item_sno'].'</font></div></div></td><td><div class="form-group row"><div class="col-sm-12"><input type="hidden" class="item_code'.$i.'" value="'.$value['item_id'].'" name="item_code[]"><font class="items'.$i.'">'.$value->item['code'].'</font></div></div></td><td><div class="form-group row"><div class="col-sm-12"><input class="item_name'.$i.'" type="hidden" value="'.$value->item['name'].'" name="item_name[]"><font class="font_item_name'.$i.'">'.$value->item['name'].'</font></div></div></td><td><div class="form-group row"><div class="col-sm-12"><input class="hsn'.$i.'" type="hidden" value="'.$value->item['hsn'].'" name="hsn[]"><font class="font_hsn'.$i.'">'.$value->item['hsn'].'</font></div></div></td><td><div class="form-group row"><div class="col-sm-12"><input type="hidden" class="mrp'.$i.'" value="'.$value['mrp'].'" name="mrp[]"><font class="font_mrp'.$i.'">'.$value['mrp'].'</font></div></div></td><td><div class="form-group row"><div class="col-sm-12" id="unit_price"><input type="hidden" class="exclusive'.$i.'" value="'.$value['rate_exclusive_tax'].'" name="exclusive[]"><font class="font_exclusive'.$i.'">'.$value['rate_exclusive_tax'].'</font><input type="hidden" class="inclusive'.$i.'" value="'.$value['rate_inclusive_tax'].'" name="inclusive[]"></div></div></td><td><div class="form-group row"><div class="col-sm-12"><input type="hidden" class="quantity'.$i.'" value="'.$value['qty'].'" name="quantity[]"><font class="font_quantity'.$i.'">'.$value['qty'].'</font></div></div></td><td><div class="form-group row"><div class="col-sm-12"><input type="hidden" class="uom'.$i.'" value="'.$value['uom_id'].'" name="uom[]"><font class="font_uom'.$i.'">'.$value->uom['name'].'</font></div></div></td><td><div class="form-group row"><div class="col-sm-12"><input type="hidden" class="table_amount" id="amnt'.$i.'" value="'.$item_amount.'" name="amount[]"><font class="font_amount'.$i.'">'.$item_amount.'</font></div></div></td><td><div class="form-group row"><div class="col-sm-12"><input type="hidden" class="input_discounts" value="'.$value['discount'].'" id="input_discount'.$i.'" ><input class="discount_val'.$i.'" type="hidden" value="'.$value['discount'].'" name="discount[]"><font class="font_discount" id="font_discount'.$i.'">'.$value['discount'].'</font></div></div></td><td><div class="form-group row"><div class="col-sm-12"><input type="hidden" class="table_gst" id="tax'.$i.'" value="'.$item_gst_rs.'" name="gst[]"><input type="hidden" class="tax_gst'.$i.'"  value="'.$value['gst'].'" name="tax_rate[]"><font class="font_gst'.$i.'">'.$item_gst_rs.'</font></div></div></td><td><div class="form-group row"><div class="col-sm-12"><input type="hidden" class="table_net_price" id="net_price'.$i.'" value="'.$item_net_value.'" name="net_price[]"><font class="font_net_price'.$i.'">'.$item_net_value.'</font></div></div></td><td style="background-color: #FAF860;"><div class="form-group row"><div class="col-sm-12"><center><font class="last_purchase'.$i.'">'.$net_value.'</font></center></div></div></td><td><i class="fa fa-eye px-2 py-1 bg-info  text-white rounded show_items" id="'.$i.'" aria-hidden="true"></i><i class="fa fa-pencil px-2 py-1 bg-success  text-white rounded edit_items" id="'.$i.'" aria-hidden="true"></i><i class="fa fa-trash px-2 py-1 bg-danger  text-white rounded remove_items" id="'.$i.'" aria-hidden="true"></i></td></tr>';

            $item_amounts[] = $value->qty * $value->rate_exclusive_tax;
            $item_gst_rss[] = $item_amounts[$key] * $value->gst / 100;
            $item_net_values[] = $item_amounts[$key] + $item_gst_rss[$key] - $value->discount;


            $item_amount_sum = $item_amount_sum + $item_amounts[$key];         
            $item_net_value_sum = $item_net_value_sum + $item_net_values[$key];
            $item_gst_rs_sum = $item_gst_rs_sum + $item_gst_rss[$key];
            $item_discount_sum = $item_discount_sum + $value->discount;

        

        }  
        $expense_typess="";
        $expense_cnt=0;
        foreach($purchaseorder_expense as $key => $value)  
        {
            $expense_cnt++;
        $expense_typess.= '<div class="row col-md-12 expense"><div class="col-md-3"><label style="font-family: Times new roman;">Expense Type</label><br><div class="form-group row"><div class="col-sm-8"><select class="js-example-basic-multiple col-12 form-control custom-select expense_type" name="expense_type[]">@if(isset($value->expense_types->type) && !empty($value->expense_types->type))<option value="'.$value->expense_types->id.'">'.$value->expense_types->type.'</option>';
                foreach($expense_type as $expense_types){
                    $expense_typess.='<option value="'.$expense_types->id.'">'.$expense_types->type.'</option>';
                }
                    $expense_typess.='</select></div><a href="{{ url("master/expense-type/create")}}" target="_blank"><button type="button"  class="px-2 btn btn-success ml-2" title="Add Expense type"><i class="fa fa-plus-circle" aria-hidden="true"></i></button></a><button type="button"  class="px-2 btn btn-success mx-2 refresh_expense_type_id" title="Add Expense Type"><i class="fa fa-refresh" aria-hidden="true"></i></button></div></div><div class="col-md-2"><label style="font-family: Times new roman;">Expense Amount</label><input type="number" class="form-control expense_amount"  placeholder="Expense Amount" name="expense_amount[]" pattern="[0-9]{0,100}" title="Numbers Only" value="'.$value->expense_amount.'"></div><div class="col-md-2"><label><font color="white" style="font-family: Times new roman;">Add Expense</font></label><br><input type="button" class="btn btn-success" value="+" onclick="expense_add()" name="" id="add_expense">&nbsp;<input type="button" class="btn btn-danger remove_expense" value="-" name="" id="remove_expense"></div></div>' ;
    }

        $result_array=array('status'=>$status,'data'=>$table_tbody,'item_amount_sum'=>$item_amount_sum,'item_net_value_sum'=>$item_net_value_sum,'item_gst_rs_sum'=>$item_gst_rs_sum,'item_discount_sum'=>$item_discount_sum,'round_off'=>$round_off,'total_net_value'=>$total_net_value,'expense_typess'=>$expense_typess,'date_purchaseorder'=>$date_purchaseorder,'purchase_type'=>$purchase_type,'date_estimation'=>$date_estimation,'estimation_no'=>$estimation_no,'expense_cnt'=>$expense_cnt);
        echo json_encode($result_array);exit;
    echo $table_tbody;exit;  

        $item_sgst = $item_gst_rs_sum/2;
        $item_cgst = $item_gst_rs_sum/2;    



        



echo "<pre>"; print_r($data); exit;
                       return $data;




        return view('admin.purchaseorder.add',compact('categories','supplier','agent','brand','expense_type','item','estimation','estimations','estimation_item','estimation_expense','net_value','item_gst_rs','item_amount','item_net_value','item_amount_sum','item_net_value_sum','item_gst_rs_sum','item_discount_sum','item_sgst','item_cgst','expense_row_count','item_row_count','voucher_no','date'));
    }


}