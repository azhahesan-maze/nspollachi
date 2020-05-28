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




class EstimationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        

        $voucher_num=Estimation::orderBy('estimation_no','DESC')
                           ->select('estimation_no')
                           ->first();

         if ($voucher_num == null) 
         {
             $voucher_no=1;

                             
         }                  
         else
         {
             $current_voucher_num=$voucher_num->estimation_no;
             $voucher_no=$current_voucher_num+1;
        
         
         }

        return view('admin.estimation.add',compact('date','categories','voucher_no','supplier','item','agent','brand','expense_type'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $estimation_no=Estimation::orderBy('estimation_no','DESC')
                           ->select('estimation_no')
                           ->first();

         if ($estimation_no == null) 
         {
             $voucher_no=1;

                             
         }                  
         else
         {
             $current_voucher_num=$estimation_no->estimation_no;
             $voucher_no=$current_voucher_num+1;
        
         }
         $voucher_date = $request->voucher_date;

         $estimation = new Estimation();

         $estimation->estimation_no = $voucher_no;
         $estimation->estimation_date = $request->voucher_date;
         $estimation->supplier_id = $request->supplier_id;
         $estimation->address_line_1 = $request->address_line_1;
         $estimation->address_line_2 = $request->address_line_2;
         $estimation->city_id = $request->city_id;
         $estimation->district_id = $request->district_id;
         $estimation->state_id = $request->state_id;
         $estimation->postal_code = $request->postal_code;
         $estimation->agent_id = $request->agent_id;
         $estimation->total_discount = $request->total_discount;
         $estimation->total_amount = $request->total_amount;
         $estimation->total_net_value = $request->total_price;
         $estimation->round_off = $request->round_off;
         $estimation->gst = $request->igst;

         $estimation->save();

         $items_count = $request->counts;
         $expense_count = $request->expense_count;

         for($i=0;$i<$items_count;$i++)

        {
            $estimation_items = new Estimation_Item();

            $estimation_items->estimaion_no = $voucher_no;
            $estimation_items->item_sno = $request->invoice_sno[$i];
            $estimation_items->item_code = $request->item_code[$i];
            $estimation_items->item_name = $request->item_name[$i];
            $estimation_items->hsn = $request->hsn[$i];
            $estimation_items->mrp = $request->mrp[$i];
            $estimation_items->tax_rate = $request->tax_rate[$i];
            $estimation_items->exclusive_tax = $request->exclusive[$i];
            $estimation_items->inclusive_tax = $request->inclusive[$i];
            $estimation_items->qty = $request->quantity[$i];
            $estimation_items->uom = $request->uom[$i];
            $estimation_items->amount = $request->amount[$i];
            $estimation_items->discount = $request->discount[$i];
            $estimation_items->gst = $request->gst[$i];
            $estimation_items->net_value = $request->net_price[$i];

            $estimation_items->save();
        }
         

         for($j=0;$j<$expense_count;$j++)

        {
            $estimation_expense = new Estimation_Expense();

            $estimation_expense->estimation_no = $voucher_no;
            $estimation_expense->estimation_date = $voucher_date;
            $estimation_expense->expense_type = $request->expense_type[$j];
            $estimation_expense->expense_amount = $request->expense_amount[$j];

            $estimation_expense->save();
        }

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
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

       // $data[] = $address_line_1;
       // $data[] = $address_line_2;
       // $data[] = $city_id;
       // $data[] = $district_id;
       // $data[] = $state_id;
       // $data[] = $postal_code;
       //$data[] = $address;



   return $address;   
        
    }

    public function getdata(Request $request,$id)
    {
        $id=$request->id;
        $data[]=Item::join('uoms','uoms.id','=','items.uom_id')
                    ->where('items.id','=',$id)
                    ->select('items.id as item_id','items.name as item_name','mrp','hsn','code','uoms.id as uom_id','uoms.name as uom_name','items.ptc')
                    ->first();
        $data[] =ItemTaxDetails::where('item_id','=',$id)
                                ->select('igst')
                                ->first(); 
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
        return $data;
    }

    public function change_items(Request $request,$id)
    {
        $categories=$request->categories;
        $brand=$request->brand;
        $result="";
        $item=array();
        if($categories !="" && $brand == "no_val"){
             $item=Item::where('category_id',$categories)->get();
        }else if($categories !="" && $brand != "" && $brand != "no_val" ){
            $item=Item::where('category_id',$categories)->where('brand_id',$brand)->get();
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
            $barcode="";
            if(count($value->item_barcode_details)>0){
                $barcode_array=[];
                foreach($value->item_barcode_details as $row){
                    $barcode_array[]=$row->barcode;
                }
                $barcode=implode(",",$barcode_array);
            }
             $result .='<tr class="row_category"><td><center><input type="radio" name="select" onclick="add_data('.$key.')"></center></td><td><input type="hidden" value="'.$value->id.'" class="append_item_id'.$key.'"><input type="hidden" value="'.$value->code.'" class="append_item_code'.$key.'"><font style="font-family: Times new roman;">'.$value->code.'</font></td><td><input type="hidden" value="'.$value->name.'" class="append_item_name'.$key.'"><font style="font-family: Times new roman;">'.$value->name.'</font></td><td><input type="hidden" value="'.$value->brand_id.'" class="append_item_brand_name'.$key.'"><font style="font-family: Times new roman;">'.$barnd_name .'</font></td><td><input type="hidden" value="'.$value->category_id.'" class="append_item_brand_name'.$key.'"><font style="font-family: Times new roman;">'.$category_name .'</font></td><td><input type="hidden" value="'.$value->ptc.'" class="append_item_brand_name'.$key.'"><font style="font-family: Times new roman;">'.$value->ptc.'</font></td><td><input type="hidden" value="'.$barcode.'" class="append_item_brand_name'.$key.'"><font style="font-family: Times new roman;">'.$barcode.'</font></td></tr>';
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

        
        $items = Item::join('brands','brands.id','=','items.brand_id')
                     ->join('categories','categories.id','=','items.category_id')
                     ->where('items.brand_id','=',$brand)
                     ->select('items.id as item_id','items.code as item_code','items.name as item_name','brands.id as brand_id','brands.name as brand_name','items.ptc','categories.id as categories_id','categories.name as category_name')
                     ->get();

        foreach ($items as $key => $value) {
             $item_id=$value->item_id;

             $data[] =ItemBracodeDetails::where('item_bracode_details.item_id','=',$item_id)
                                        ->select('barcode')
                                        ->get();
                 }  

             $data[] = $items;      
        

        return $data;
          

    }


    public function getdata_item(Request $request,$id)
    {
        $id=$request->id;

        $item = Item::join('item_bracode_details','item_bracode_details.item_id','=','items.id')
                    ->where('items.code','=',$id)
                    ->orWhere('items.ptc','=',$id)
                    ->orWhere('item_bracode_details.barcode','=',$id)
                    ->select('items.id as item_id','items.name as items_name','items.mrp as item_mrp','items.hsn as item_hsn','items.code as item_code')
                    ->first();

                    //return $item;

                   $item_id= $item->item_id;

        $data[]=Item::join('uoms','uoms.id','=','items.uom_id')
                    ->join('item_bracode_details','item_bracode_details.item_id','=','items.id')
                    ->where('items.code','=',$id)
                    ->orWhere('items.ptc','=',$id)
                    ->orWhere('item_bracode_details.barcode','=',$id)
                    ->select('items.id as item_id','items.name as item_name','mrp','hsn','code','uoms.id as uom_id','uoms.name as uom_name')
                    ->first();
                    

        $data[] =ItemTaxDetails::where('item_id','=',$item_id)
                                ->select('igst')
                                ->first(); 
        if($data[1]=='')  
        {
            $data[1]=0;
        }                                
        return $data;
    }

    
}
