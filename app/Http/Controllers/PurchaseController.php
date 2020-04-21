<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Purchase;

class PurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $purchases = Purchase::select('batch_no','total_amount','total_price')
                             ->groupBy('batch_no','total_amount','total_price')
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
        $items=Item::all();
        return view('admin.purchase.add',compact('items'));
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
        //return $count;

        for($i=0;$i<$count;$i++)
        {
            
                $insert = new Purchase;

            
           $insert->batch_no = $request->get('batch_no');
           $insert->total_amount = $request->get('total_amount');
           $insert->total_price = $request->get('total_price');
           $insert->invoice_no = $request->invoice_sno[$i];
           $insert->item_code = $request->item_code[$i];
           $insert->item_name = $request->item_name[$i];
           $insert->mrp = $request->mrp[$i];
           $insert->hsn = $request->hsn[$i];
           $insert->tax_rate = $request->tax_rate[$i];
           $insert->quantity = $request->quantity[$i];

           // if($request->tax[$i] == '')
           // {
           //  $insert->inclusive = 0;
           // }
           // else
           // {
           //  $insert->inclusive = $request->tax[$i];
           // }
           $insert->rate_exclusive = floatval($request->exclusive[$i]);
           $insert->rate_inclusive = floatval($request->inclusive[$i]);
           $insert->amount = $request->amount[$i];
           $insert->discount = $request->discount[$i];
           $insert->net_price = $request->net_price[$i];
           $insert->save();
            
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

    public function getdata(Request $request,$id)
    {
        $id=$request->id;
        $data=Item::where('code','=',$id)
                    ->select('name','mrp','hsn')
                    ->first();
        return $data;
    }
    
    public function storedata(Request $request)
    {
        $id=$request->count;
        $batch_no=$request->batch_no;

        for($i=0;$i<=$id;$i++)
        {
            $insert =new Purchase();
           $insert->batch_no = $request->get('batch_no');  
           $insert->invoice_no = $request->invoice_no[$i];
           $insert->item_code = $request->item_code[$i];
           $insert->item_name = $request->item_name[$i];
           $insert->mrp = $request->mrp[$i];
           $insert->hsn = $request->hsn[$i];
           $insert->tax_rate = $request->tax_rate[$i];
           $insert->quantity = $request->quantity[$i];
           $insert->inclusive = $request->inclusive[$i];
           $insert->rate_exclusive = $request->rate_exclusive[$i];
           $insert->rate_inclusive = $request->rate_inclusive[$i];
           $insert->amount = $request->amount[$i];
           $insert->discount = $request->discount[$i];
           $insert->net_price = $request->net_price[$i];
           $insert->save();
        }

        $data = Purchase::where('batch_no','=',$batch_no)
                        ->get();

        return $data;                
        
    }

    public function item_details($id)
    {
        $items = Purchase::where('batch_no','=',$id)
                         ->get();

        return view('admin.purchase.item_details',compact('items'));                 
    }
}
