<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Category;
use App\Purchase;
use App\Models\ItemTaxDetails;
use App\Temporary_Purchase;
use App\GatePassEntry;
use App\Purchase_Details;


class PurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $purchases = Purchase_Details::join('gate_pass_entries','gate_pass_entries.id','=',
                                            'purchase__details.gate_pass_no')
                                       ->select('*','gate_pass_entries.id as gatepass_id',
                                        'purchase__details.id as purchase_details_id',
                                        'purchase__details.gate_pass_no as gatepass_no',
                                        'gate_pass_entries.gate_pass_no as gatepassentries_gatepass_no')
                                       ->get();
                                       
        return view('admin.purchase.view',compact('purchases'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $date=date('Y-m-d');
        $items=Item::all();
        $categories=Category::all();
        $gatepass_no=GatePassEntry::all();
        return view('admin.purchase.add',compact('items','categories','date','gatepass_no'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        error_reporting(0);
        $count = $request->counts;

        //return $request->get('total_amount');

        for($i=0;$i<$count;$i++)
        {
              $insert = new Purchase;
            
           $insert->gatepass_no = $request->get('gatepass_no');
           $insert->invoice_no = $request->invoice_sno[$i];
           $insert->item_code = $request->item_code[$i];
           $insert->item_name = $request->item_name[$i];
           $insert->mrp = $request->mrp[$i];
           $insert->hsn = $request->hsn[$i];
           $insert->tax_rate = $request->tax_rate[$i];
           $insert->quantity = $request->quantity[$i];
           $insert->rate_exclusive = floatval($request->exclusive[$i]);
           $insert->rate_inclusive = floatval($request->inclusive[$i]);
           $insert->amount = $request->amount[$i];
           $insert->discount = $request->discount[$i];
           $insert->net_price = $request->net_price[$i];
           $insert->save();
            
        }


        $voucher_num=Purchase_Details::orderBy('voucher_no','DESC')
                           ->select('voucher_no')
                           ->first();

         if ($voucher_num == null) 
         {
             $voucher_no=1;

                             
         }                  
         else
         {
             $current_voucher_num=$voucher_num->voucher_no;
             $voucher_no=$current_voucher_num+1;
        
         
         }

        $purchase_details = new Purchase_Details;

        $purchase_details->voucher_no = $voucher_no;
        $purchase_details->voucher_date = $request->voucher_date;
        $purchase_details->gate_pass_no = $request->gatepass_no;
        $purchase_details->receipt_note_no = $request->receipt_note_no;
        $purchase_details->supplier_invoice_no = $request->supplier_invoice_no;
        $purchase_details->supplier_invoice_date = $request->supplier_invoice_date;
        $purchase_details->supplier_details = $request->supplier_details;
        $purchase_details->order_details = $request->order_details;
        $purchase_details->transport_details = $request->transport_details;
        $purchase_details->remarks = $request->remarks;
        $purchase_details->supplier_invoice_value = $request->supplier_invoice_value;
        $purchase_details->total_amount = $request->get('total_amount');
        $purchase_details->total_price = $request->get('total_price');

        $purchase_details->save();

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

    public function getdata(Request $request,$id)
    {
        $id=$request->id;
        $data[]=Item::where('id','=',$id)
                    ->select('name','mrp','hsn','code')
                    ->first();
        $data[] =ItemTaxDetails::where('item_id','=',$id)
                                ->select('igst')
                                ->first(); 
        if($data[1]=='')  
        {
            $data[1]=0;
        }                                
        return $data;
    }
    
    public function storedata(Request $request)
    {
        
           $gatepass_no = $request->array[0];
           $invoice_no = $request->array[1];
           $item_code = $request->array[2];
           $item_name = $request->array[3];
           $mrp = $request->array[4];
           $hsn = $request->array[5];
           $quantity = $request->array[6];
           $tax_rate = $request->array[7];
           $rate_exclusive =$request->array[8];
           $rate_inclusive =$request->array[9];
           $amount = $request->array[10];
           $discount = $request->array[11];
           $net_price = $request->array[12];

           $voucher_date = $request->array_new[0];
           $receipt_note_no = $request->array_new[1];
           $supplier_invoice_no = $request->array_new[2];
           $supplier_invoice_date = $request->array_new[3];
           $supplier_details = $request->array_new[4];
           $order_details = $request->array_new[5];
           $transport_details = $request->array_new[6];
           $remarks = $request->array_new[7];
           $supplier_invoice_value =$request->array_new[8];
           
           $insert = new Temporary_Purchase;

           $insert->gatepass_no = $gatepass_no;
           $insert->voucher_date = $voucher_date;
           $insert->receipt_note_no = $receipt_note_no;
           $insert->supplier_invoice_no = $supplier_invoice_no;
           $insert->supplier_invoice_date = $supplier_invoice_date;
           $insert->supplier_details = $supplier_details;
           $insert->order_details = $order_details;
           $insert->transport_details = $transport_details;
           $insert->remarks = $remarks;
           $insert->supplier_invoice_value = $supplier_invoice_value;
           $insert->invoice_no = $invoice_no;
           $insert->item_code = $item_code;
           $insert->item_name = $item_name;
           $insert->mrp = $mrp;
           $insert->hsn = $hsn;
           $insert->tax_rate = $tax_rate;
           $insert->quantity = $quantity;
           $insert->rate_exclusive =$rate_exclusive;
           $insert->rate_inclusive =$rate_inclusive;
           $insert->amount = $amount;
           $insert->discount = $discount;
           $insert->net_price = $net_price;
           $insert->status = 1;
           $insert->save();


        
    }

    

    public function remove_data(Request $request)
    {
        $invoice_no = $request->invoice_no;
        $gate_pass_no = $request->gatepass_no;

        $Temporary_Purchase = Temporary_Purchase::where('invoice_no','=',$invoice_no)
                            ->where('gatepass_no','=',$gate_pass_no)
                            ->first();

        $Temporary_Purchase->status = 0; 
        $Temporary_Purchase->save();                  
    }

    public function gatepass_details(Request $request)
    {
   $id = $request->gatepass_no;

   $gatepass_data = GatePassEntry::join('suppliers','suppliers.id','=','gate_pass_entries.supplier_name')
                                    ->where('gate_pass_entries.id','=',$id)
                                    ->select('*','suppliers.id as supplier_id','gate_pass_entries.id as gatepass_id')
                                    ->first();
       return $gatepass_data;
    }

    public function item_details($id)
    {
        $items = Purchase::join('items','items.id','=','purchases.item_code')
                           ->where('purchases.gatepass_no','=',$id)
                           ->select('*','items.id as item_id','purchases.id as purchase_id')
                           ->get();

        return view('admin.purchase.item_details',compact('items'));                 
    }

    public function change_items(Request $request,$id)
    {
        $id=$request->id;
        
        $items = Item::where('category_id','=',$id)
                     ->select('id','code','name')
                     ->get();
          
                   

          return $items;

    }
    public function get_items($id)
    {
        $items = Item::all();
        return $items;
    }
}
