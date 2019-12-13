<?php

namespace App\Http\Controllers;

use App\CategoryName;
use App\Http\Requests\ItemRequest;
use App\Models\Category_one;
use App\Models\Category_three;
use App\Models\Category_two;
use App\Models\Item;
use App\Models\Language;
use App\Models\Uom;
use App\Models\UomFactorConvertionForItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ItemController extends Controller
{
    public $language;
    public $language_1;
    public $language_2;
    public $language_3;
    public $category;
    public $category_1;
    public $category_2;
    public $category_3;

    public function __construct()
     {
        $this->language=Language::all();
        $this->category=CategoryName::all();
        $this->language_1=isset($this->language[0]->language_1) && !empty($this->language[0]->language_1) ? $this->language[0]->language_1 : "Language 1 " ;
        $this->language_2=isset($this->language[0]->language_2) && !empty($this->language[0]->language_2) ? $this->language[0]->language_2 : "Language 2 " ;
        $this->language_3=isset($this->language[0]->language_3) && !empty($this->language[0]->language_3) ? $this->language[0]->language_3 : "Language 3 " ;

        $this->category_1=isset($this->category[0]->category_1) && !empty($this->category[0]->category_1) ? $this->category[0]->category_1 : "Category 1 " ;
        $this->category_2=isset($this->category[0]->category_2) && !empty($this->category[0]->category_2) ? $this->category[0]->category_2 : "Category 2 " ;
        $this->category_3=isset($this->category[0]->category_3) && !empty($this->category[0]->category_3) ? $this->category[0]->category_3 : "Category 3 " ;
        
    
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category_1=$this->category_1;
        $category_2=$this->category_2;
        $category_3=$this->category_3;
        $language_1=$this->language_1;
        $language_2=$this->language_2;
        $language_3=$this->language_3;
       
        $item=Item::all();
        return view('admin.master.item.view',compact('item','language_1','language_2','language_3','category_1','category_2','category_3'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category_1=$this->category_1;
        $category_2=$this->category_2;
        $category_3=$this->category_3;
        $language_1=$this->language_1;
        $language_2=$this->language_2;
        $language_3=$this->language_3;
        $category_one=Category_one::all();
        $category_two=Category_two::all();
        $category_three=Category_three::all();
        $uom=Uom::all();
        $language=Language::all();
        return view('admin.master.item.add',compact('category_one','category_two','category_three','uom','language','language_1','language_2','language_3','category_1','category_2','category_3'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ItemRequest $request)
    {
        $item=new Item();
        $item->name=$request->name;
        $item->item_type=$request->item_type;
        $item->code=$request->code;
        $item->category_1=$request->category_1;
        $item->category_2=$request->category_2;
        $item->category_3=$request->category_3;
        $item->print_name_in_english=$request->print_name_in_english;
        $item->print_name_in_language_1=$request->print_name_in_language_1;
        $item->print_name_in_language_2=$request->print_name_in_language_2;
        $item->print_name_in_language_3=$request->print_name_in_language_3;
        $item->ptc=$request->ptc;
        $item->ean=$request->ean;
        $item->mrp=$request->mrp;
        $item->default_selling_price=$request->default_selling_price;
        $item->uom_id=$request->uom_id;
        $item->is_expiry_date=$request->is_expiry_date;
        $item->machine_weight_applicable=$request->machine_weight_applicable;
        if(!empty($request->expiry_date))
        {
            $item->expiry_date=date('Y-m-d',strtotime($request->expiry_date));
        }
        
        $item->created_by = 0;
        if($item->save())
        {
            return Redirect::back()->with('success', 'Successfully created');
        } else {
            return Redirect::back()->with('failure', 'Something Went Wrong..!');
        }

      }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function show(Item $item,$id)
    {
        $category_1=$this->category_1;
        $category_2=$this->category_2;
        $category_3=$this->category_3;
        $language_1=$this->language_1;
        $language_2=$this->language_2;
        $language_3=$this->language_3;
        $item=Item::find($id);
        return view('admin.master.item.show',compact('item','language_1','language_2','language_3','category_1','category_2','category_3'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function edit(Item $item,$id)
    {
        $category_1=$this->category_1;
        $category_2=$this->category_2;
        $category_3=$this->category_3;
        $language_1=$this->language_1;
        $language_2=$this->language_2;
        $language_3=$this->language_3;
        $item=Item::find($id);
        $category_one=Category_one::all();
        $category_two=Category_two::all();
        $category_three=Category_three::all();
        $uom=Uom::all();
        return view('admin.master.item.edit',compact('item','language_1','language_2','language_3','category_1','category_2','category_3','category_one','category_two','category_three','uom'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(ItemRequest $request, Item $item,$id)
    {
        $item=Item::find($id);
        $item->name=$request->name;
        $item->item_type=$request->item_type;
        $item->code=$request->code;
        $item->category_1=$request->category_1;
        $item->category_2=$request->category_2;
        $item->category_3=$request->category_3;
        $item->print_name_in_english=$request->print_name_in_english;
        $item->print_name_in_language_1=$request->print_name_in_language_1;
        $item->print_name_in_language_2=$request->print_name_in_language_2;
        $item->print_name_in_language_3=$request->print_name_in_language_3;
        $item->ptc=$request->ptc;
        $item->ean=$request->ean;
        $item->mrp=$request->mrp;
        $item->default_selling_price=$request->default_selling_price;
        $item->uom_id=$request->uom_id;
        $item->is_expiry_date=$request->is_expiry_date;
        $item->machine_weight_applicable=$request->machine_weight_applicable;
        
        if(!empty($request->expiry_date))
        {
            $item->expiry_date=date('Y-m-d',strtotime($request->expiry_date));
        }
        
        $item->created_by = 0;
        if($item->save())
        {
            return Redirect::back()->with('success', 'Updated Successfully');
        } else {
            return Redirect::back()->with('failure', 'Something Went Wrong..!');
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy(Item $item,$id)
    {
        $item=Item::find($id);
    if($item->delete())
    {
        return Redirect::back()->with('success', 'Deleted Successfully');
    } else {
        return Redirect::back()->with('failure', 'Something Went Wrong..!');
    }
    }

    public function uomfactorconvertionforitem($id)
    {
        $category_1=$this->category_1;
        $category_2=$this->category_2;
        $category_3=$this->category_3;
        $item=Item::find($id);
        $item_dets=Item::where(['item_type'=>'Repack'])->get();
        $uom=Uom::whereNotIn('id', [$item->uom_id])->get();
        $uom_factor_convertion_for_item=UomFactorConvertionForItem::where('item_id',$id)->get();
        return view('admin.master.item.uom_factor_convertion_for_item',compact('item_dets','item','category_1','category_2','category_3','uom','uom_factor_convertion_for_item'));

    }

    public function store_uom_factor_convertion_for_item(ItemRequest $request)
    {
        $input_array=[];
        $success_count=0;
        if($request->has('uom_id'))
        {
            foreach($request->uom_id as $key=>$value)
            {
                $data=array(
                    'item_id'=>$request->item_id,
                    'category_1'=>$request->category_1,
                    'category_2'=>$request->category_2,
                    'category_3'=>$request->category_3,
                    'default_uom_id'=>$request->default_uom_id,
                    'uom_id'=>$request->uom_id[$key],
                     'convertion_factor'=>$request->convertion_factor[$key],
                     'created_by'=>0,
                 );
                 $input_array[]=$data;
            }

            if(count($input_array)>0)
            {
                $success_count++;
                UomFactorConvertionForItem::insert($input_array);
            }
        }

        if($request->has('old_uom_id'))
        {
            foreach($request->old_uom_id as $key=>$value)
            {
                $uom_factor_convertion_for_item=UomFactorConvertionForItem::find($request->uom_factor_convertion_id[$key]);
                $uom_factor_convertion_for_item->item_id=$request->item_id;
                $uom_factor_convertion_for_item->category_1=$request->category_1;
                $uom_factor_convertion_for_item->category_2=$request->category_2;
                $uom_factor_convertion_for_item->category_3=$request->category_3;
                $uom_factor_convertion_for_item->default_uom_id=$request->default_uom_id;
                $uom_factor_convertion_for_item->uom_id=$request->old_uom_id[$key];
                $uom_factor_convertion_for_item->convertion_factor=$request->old_convertion_factor[$key];
                $uom_factor_convertion_for_item->updated_by=0;
                if($uom_factor_convertion_for_item->save())
                {
                    $success_count++;
                }
           }
        }
       
    if($success_count >0)
        {
            return Redirect::back()->with('success', 'Added Successfully');
        }else
        {
            return Redirect::back()->with('failure', 'Something Went Wrong..!');

        }
       
      

      }

      public function delete_uom_factor_convertion_for_item(Request $request)
      {
          $uom_factor_convertion_id=$request->uom_factor_convertion_id;
          $uom_factor_convertion_for_item=UomFactorConvertionForItem::find($uom_factor_convertion_id);
          if($uom_factor_convertion_for_item->delete())
          {
            echo 1;

          }else
          {
           echo 0;
          }

          
      }

}
