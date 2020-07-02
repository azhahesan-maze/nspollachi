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
use Carbon\Carbon;
use App\Models\SaleOrder;
use App\Models\SaleOrderItem;
use App\Models\SaleOrderExpense;
use App\Models\SaleEntry;
use App\Models\SaleEntryItem;
use App\Models\SaleEntryExpense;
use Illuminate\Support\Facades\Redirect;
use App\Models\CreditNote;

class CreditNoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $credit_note = CreditNote::all();
        return view('admin.credit_note.view',compact('credit_note'));
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
        $sale_entry = SaleEntry::all();
        $customer = Customer::all();
        

        $voucher_num=CreditNote::orderBy('cn_no','DESC')
                           ->select('cn_no')
                           ->first();

         if ($voucher_num == null) 
         {
             $voucher_no=1;

                             
         }                  
         else
         {
             $current_voucher_num=$voucher_num->cn_no;
             $voucher_no=$current_voucher_num+1;
        
         
         }

        return view('admin.credit_note.add',compact('date','categories','voucher_no','supplier','item','agent','brand','expense_type','estimation','sale_entry','customer'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
}
