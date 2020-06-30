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
use App\Models\SaleGatepassEntry;
use App\Models\SaleOrder;
use Illuminate\Support\Facades\Redirect;

class SalesGatepassEntryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sales_gatepass = SaleGatepassEntry::all();
        // echo "<pre>"; print_r($sales_gatepass);exit;
        return view('admin.sales_gatepass.view',compact('sales_gatepass'));
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
        $saleorder = SaleOrder::all();
        $estimation = Estimation::all();

        $sales_gatepass_num=SaleGatepassEntry::orderBy('sales_gatepass_no','DESC')
                           ->select('sales_gatepass_no')
                           ->first();

         if ($sales_gatepass_num == null) 
         {
             $voucher_no=1;

                             
         }                  
         else
         {
             $current_voucher_num=$sales_gatepass_num->sales_gatepass_no;
             $voucher_no=$current_voucher_num+1;
        
         }

        return view('admin.sales_gatepass.add',compact('date','customer','categories','supplier','item','agent','brand','expense_type','saleorder','estimation','voucher_no'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $sales_gatepass_num=SaleGatepassEntry::orderBy('sales_gatepass_no','DESC')
                           ->select('sales_gatepass_no')
                           ->first();

         if ($sales_gatepass_num == null) 
         {
             $voucher_no=1;

                             
         }                  
         else
         {
             $current_voucher_num=$sales_gatepass_num->sales_gatepass_no;
             $voucher_no=$current_voucher_num+1;
        
         }
        $sales_gatepass = new SaleGatepassEntry();

         $sales_gatepass->sales_gatepass_no = $voucher_no;
         $sales_gatepass->sales_gatepass_date = $request->voucher_date;
         $sales_gatepass->customer_id = $request->customer_id;
         $sales_gatepass->so_no = $request->so_no;
         $sales_gatepass->so_date = $request->so_date;
         $sales_gatepass->estimation_no = $request->estimation_no;
         $sales_gatepass->estimation_date = $request->estimation_date;
         $sales_gatepass->load_live = $request->load_live;
         $sales_gatepass->unload_live = $request->unload_live;
         $sales_gatepass->load_bill = $request->load_bill;
         $sales_gatepass->unload_bill = $request->unload_bill;

         $sales_gatepass->save();

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

        $sales_gatepass = SaleGatepassEntry::where('sales_gatepass_no',$id)->first();

        if(isset($sales_gatepass->customer->name) && !empty($sales_gatepass->customer->name))
        {
            $customer_id = $sales_gatepass->customer->id;

            $address_details = AddressDetails::where('address_ref_id',$customer_id)
                                            ->where('address_table','=','Cus')
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
             $address.="GST Number :".$address_details->customer->gst_no;
         }
                                          
        }
        else
        {
            $address = '';
        }
        return view('admin.sales_gatepass.show',compact('sales_gatepass','address'));
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
        $saleorder = SaleOrder::all();
        $estimation = Estimation::all();

        $sales_gatepass = SaleGatepassEntry::where('sales_gatepass_no',$id)->first();

        return view('admin.sales_gatepass.edit',compact('date','customer','categories','supplier','item','agent','brand','expense_type','saleorder','estimation','sales_gatepass'));
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
        $sales_gatepass_data = SaleGatepassEntry::where('sales_gatepass_no',$id);
        $sales_gatepass_data->delete();

        $sales_gatepass = new SaleGatepassEntry();

         $sales_gatepass->sales_gatepass_no = $request->voucher_no;
         $sales_gatepass->sales_gatepass_date = $request->voucher_date;
         $sales_gatepass->customer_id = $request->customer_id;
         $sales_gatepass->so_no = $request->so_no;
         $sales_gatepass->so_date = $request->so_date;
         $sales_gatepass->estimation_no = $request->estimation_no;
         $sales_gatepass->estimation_date = $request->estimation_date;
         $sales_gatepass->load_live = $request->load_live;
         $sales_gatepass->unload_live = $request->unload_live;
         $sales_gatepass->load_bill = $request->load_bill;
         $sales_gatepass->unload_bill = $request->unload_bill;

         $sales_gatepass->save();

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
        $sales_gatepass_data = SaleGatepassEntry::where('sales_gatepass_no',$id);
        $sales_gatepass_data->delete();
         return Redirect::back()->with('success', 'Deleted Successfully');
    }

    public function address_details(Request $request)
    {
       $customer_id = $request->customer_id;

       $getdata = AddressDetails::where('address_details.address_table','=','Cus')
       ->where('address_details.address_ref_id','=',$customer_id)
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
         $address.="GST Number :".$getdata->customer->gst_no;



   return $address;   
        
    }
}
