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
use App\Models\Customer;
use App\Models\PurchaseGatepassEntry;
use App\Models\Purchase_Order;
use Illuminate\Support\Facades\Redirect;

class PurchaseGatepassEntryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $purchase_gatepass = PurchaseGatepassEntry::all();
        // echo "<pre>"; print_r($sales_gatepass);exit;
        return view('admin.purchase_gatepass.view',compact('purchase_gatepass'));
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
        $customer = Customer::all();
        $purchaseorder = Purchase_Order::all();
        $estimation = Estimation::all();

        $purchase_gatepass_num=PurchaseGatepassEntry::orderBy('purchase_gatepass_no','DESC')
                           ->select('purchase_gatepass_no')
                           ->first();

         if ($purchase_gatepass_num == null) 
         {
             $voucher_no=1;

                             
         }                  
         else
         {
             $current_voucher_num=$purchase_gatepass_num->purchase_gatepass_no;
             $voucher_no=$current_voucher_num+1;
        
         }

        return view('admin.purchase_gatepass.add',compact('date','supplier','categories','customer','item','agent','brand','expense_type','purchaseorder','estimation','voucher_no'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $purchase_gatepass_num=PurchaseGatepassEntry::orderBy('purchase_gatepass_no','DESC')
                           ->select('purchase_gatepass_no')
                           ->first();

         if ($purchase_gatepass_num == null) 
         {
             $voucher_no=1;

                             
         }                  
         else
         {
             $current_voucher_num=$purchase_gatepass_num->purchase_gatepass_no;
             $voucher_no=$current_voucher_num+1;
        
         }
        $purchase_gatepass = new PurchaseGatepassEntry();

         $purchase_gatepass->purchase_gatepass_no = $voucher_no;
         $purchase_gatepass->purchase_gatepass_date = $request->voucher_date;
         $purchase_gatepass->supplier_id = $request->supplier_id;
         $purchase_gatepass->po_no = $request->po_no;
         $purchase_gatepass->po_date = $request->po_date;
         $purchase_gatepass->estimation_no = $request->estimation_no;
         $purchase_gatepass->estimation_date = $request->estimation_date;
         $purchase_gatepass->load_live = $request->load_live;
         $purchase_gatepass->unload_live = $request->unload_live;
         $purchase_gatepass->load_bill = $request->load_bill;
         $purchase_gatepass->unload_bill = $request->unload_bill;

         $purchase_gatepass->save();

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
        $purchase_gatepass = PurchaseGatepassEntry::where('purchase_gatepass_no',$id)->first();

        if(isset($purchase_gatepass->supplier->name) && !empty($purchase_gatepass->supplier->name))
        {
            $supplier_id = $purchase_gatepass->supplier->id;

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
        return view('admin.purchase_gatepass.show',compact('purchase_gatepass','address'));
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
        $customer = Customer::all();
        $purchaseorder = Purchase_Order::all();
        $estimation = Estimation::all();

        $purchase_gatepass = purchaseGatepassEntry::where('purchase_gatepass_no',$id)->first();

        return view('admin.purchase_gatepass.edit',compact('date','supplier','categories','supplier','item','agent','brand','expense_type','purchaseorder','estimation','purchase_gatepass'));
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
        $purchase_gatepass_data = PurchaseGatepassEntry::where('purchase_gatepass_no',$id);
        $purchase_gatepass_data->delete();

        $purchase_gatepass = new PurchaseGatepassEntry();

         $purchase_gatepass->purchase_gatepass_no = $request->voucher_no;
         $purchase_gatepass->purchase_gatepass_date = $request->voucher_date;
         $purchase_gatepass->supplier_id = $request->supplier_id;
         $purchase_gatepass->po_no = $request->po_no;
         $purchase_gatepass->po_date = $request->po_date;
         $purchase_gatepass->estimation_no = $request->estimation_no;
         $purchase_gatepass->estimation_date = $request->estimation_date;
         $purchase_gatepass->load_live = $request->load_live;
         $purchase_gatepass->unload_live = $request->unload_live;
         $purchase_gatepass->load_bill = $request->load_bill;
         $purchase_gatepass->unload_bill = $request->unload_bill;

         $purchase_gatepass->save();

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
        $purchase_gatepass_data = PurchaseGatepassEntry::where('purchase_gatepass_no',$id);
        $purchase_gatepass_data->delete();
         return Redirect::back()->with('success', 'Deleted Successfully');
    }

    public function address_details(Request $request)
    {
       $supplier_id = $request->supplier_id;

       $getdata = AddressDetails::where('address_details.address_table','=','Supplier')
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
         $address.="GST Number :".$getdata->supplier->gst_no;



   return $address;   
        
    }
}
