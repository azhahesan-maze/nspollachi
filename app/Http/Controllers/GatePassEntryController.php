<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\GatePassEntry;
use App\Cart;

class GatePassEntryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gatepassentry=GatePassEntry::all();
        return view('admin.master.gate_pass_entry.view',compact('gatepassentry'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $date=date('Y-m-d');

        $gatepassentry=GatePassEntry::all();

        $gate_pass_no=GatePassEntry::orderBy('gate_pass_no','DESC')
                          ->select('gate_pass_no')
                          ->first();

                        
        if ($gate_pass_no == null) 
        {
            $gatepass=1;

            return view('admin.master.gate_pass_entry.add',compact('gatepassentry','gatepass','date'));                 
        }                  
        else
        {
            $current_gate_pass_no=$gate_pass_no->gate_pass_no;
            $gatepass=$current_gate_pass_no+1;
        
        return view('admin.master.gate_pass_entry.add',compact('gatepassentry','gatepass','date'));
        }
          
        
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->cart)

        {
            $cart=new Cart;

            $cart->date=$request->date;
            $cart->supplier_name=$request->supplier_name;
            $cart->type=$request->type;
            $cart->supplier_invoice_number=$request->supplier_invoice_number;
            $cart->taxable_value=$request->taxable_value;
            $cart->tax_value=$request->tax_value;
            $cart->total_invoice_value=$request->total_invoice_value;
            $cart->load_bill=$request->load_bill;
            $cart->load_live=$request->load_live;
            $cart->unload_bill=$request->unload_bill;
            $cart->unload_live=$request->unload_live;
            $cart->status=0;
            $cart->save();

            return redirect('/gate_pass_entry');
        }

        else

        {
            $gate_pass=new GatePassEntry;

        $gate_pass->gate_pass_no=$request->num;
        $gate_pass->date=$request->date;
        $gate_pass->supplier_name=$request->supplier_name;
        $gate_pass->type=$request->type;
        $gate_pass->supplier_invoice_number=$request->supplier_invoice_number;
        $gate_pass->taxable_value=$request->taxable_value;
        $gate_pass->tax_value=$request->tax_value;
        $gate_pass->total_invoice_value=$request->total_invoice_value;
        $gate_pass->load_bill=$request->load_bill;
        $gate_pass->load_live=$request->load_live;
        $gate_pass->unload_bill=$request->unload_bill;
        $gate_pass->unload_live=$request->unload_live;

        $gate_pass->save();

        return redirect('/gate_pass_entry');

        }
        

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
        $gatepass=GatePassEntry::find($id);

        return view('admin.master.gate_pass_entry.show',compact('gatepass'));
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
       $update_gatepass=GatePassEntry::find($id);

       $update_gatepass->gate_pass_no=$request->num;
        $update_gatepass->date=$request->date;
        $update_gatepass->supplier_name=$request->supplier_name;
        $update_gatepass->type=$request->type;
        $update_gatepass->supplier_invoice_number=$request->supplier_invoice_number;
        $update_gatepass->taxable_value=$request->taxable_value;
        $update_gatepass->tax_value=$request->tax_value;
        $update_gatepass->total_invoice_value=$request->total_invoice_value;
        $update_gatepass->load_bill=$request->load_bill;
        $update_gatepass->load_live=$request->load_live;
        $update_gatepass->unload_bill=$request->unload_bill;
        $update_gatepass->unload_live=$request->unload_live;

        $update_gatepass->save();

        return redirect('/gate_pass_entry');
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
}
