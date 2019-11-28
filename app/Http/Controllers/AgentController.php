<?php

namespace App\Http\Controllers;

use App\Http\Requests\AgentRequest;
use App\Models\AddressDetails;
use App\Models\AddressType;
use App\Models\Agent;
use App\Models\State;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class AgentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $agent=Agent::all();
        return view('admin.master.agent.view',compact('agent'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $address_type=AddressType::all();
        $state=State::all();
        return view('admin.master.agent.add',compact('address_type','state'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AgentRequest $request)
    {
        $agent = new Agent();
        $agent->salutation       = $request->salutation;
        $agent->name       = $request->name;
        $agent->code      =  $request->code;
        $agent->phone_no      =  $request->phone_no;
        $agent->email      =  $request->email;
        $agent->dob      =  isset($request->dob) && $request->dob !="" ? date('Y-m-d',strtotime($request->dob)) : "" ;
      
        $agent->father_name      =  $request->father_name;
        $agent->blood_group      =  $request->blood_group;
        $agent->material_status      =  $request->material_status;
        //$agent->profile      =  $profile_name;
        $agent->created_by = 0;
        $agent->updated_by = 0;
        $now = Carbon::now('Asia/Kolkata')->toDateTimeString();
        if ($agent->save()) {
            $batch_insert_array=array();
            foreach($request->address_type_id as $key=>$value){
                $data_to_store=array(
                    'address_table'=>"Agent",
                    'address_type_id'=>$request->address_type_id[$key],
                    'address_ref_id'=>$agent->id,
                    'address_line_1'=>$request->address_line_1[$key],
                    'address_line_2'=>$request->address_line_2[$key],
                    'land_mark'=>$request->land_mark[$key],
                    'country_id'=>$request->country_id[$key],
                    'state_id'=>$request->state_id[$key],
                    'district_id'=>$request->district_id[$key],
                    'city_id'=>$request->city_id[$key],
                    'postal_code'=>$request->postal_code[$key],
                    'created_by'=>0,
                    'updated_by'=>0,
                    'created_at'=>$now,
                    'updated_at'=>$now,
                   );
                   $batch_insert_array[]=$data_to_store;
                }
                if(count($batch_insert_array)>0){
                    AddressDetails::insert($batch_insert_array);
                }
               
    
    
                return Redirect::back()->with('success', 'Successfully created');
            } else {
                return Redirect::back()->with('failure', 'Something Went Wrong..!');
            }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Agent  $agent
     * @return \Illuminate\Http\Response
     */
    public function show(Agent $agent,$id)
    {
        $agent=Agent::find($id);
        $agent_address_details=AddressDetails::where('address_ref_id',$id)->where('address_table','Agent')->get();
         return view('admin.master.agent.show',compact('agent','agent_address_details'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Agent  $agent
     * @return \Illuminate\Http\Response
     */
    public function edit(Agent $agent)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Agent  $agent
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Agent $agent)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Agent  $agent
     * @return \Illuminate\Http\Response
     */
    public function destroy(Agent $agent)
    {
        //
    }
}
