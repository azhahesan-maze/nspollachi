<?php

namespace App\Http\Controllers;

use App\Models\Location;
use App\Models\LocationType;
use App\Models\State;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $location=Location::all();
        return view('admin.master.location.view',compact('location'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $state=State::all();
        $location_type=LocationType::all();
        return view('admin.master.location.add',compact('state','location_type'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'location_type_id' => 'required',
            'address_line_1' => 'required',
            'name' => 'required',
            'state_id' => 'required',
            'postal_code' => 'required',
            'name' => 'required|unique:locations,name,NULL,id,deleted_at,NULL,location_type_id,'.$request->location_type_id,
            ])->validate();
            $location = new Location();
            $location->name       = $request->name;
            $location->location_type_id      = $request->location_type_id;
            $location->address_line_1      = $request->address_line_1;
            $location->address_line_2      = $request->address_line_2;
            $location->land_mark      = $request->land_mark;
            $location->country_id      = 1;
            $location->state_id      = $request->state_id;
            $location->district_id      = $request->district_id;
            $location->city_id      = $request->city_id;
            $location->postal_code      = $request->postal_code;
            $location->country_id = 1; /* Only India's States   */
            $location->created_by = 0;
            $location->updated_by = 0;

            if ($location->save()) {
                return Redirect::back()->with('success', 'Successfully created');
            } else {
                return Redirect::back()->with('failure', 'Something Went Wrong..!');
            }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function show(Location $location,$id)
    {
        $location=Location::find($id);
        return view('admin.master.location.show',compact('location'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function edit(Location $location,$id)
    {
        $state=State::all();
        $location_type=LocationType::all();
        $location=Location::find($id);
        return view('admin.master.location.edit',compact('state','location_type','location'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Location $location,$id)
    {
        $location = Location::find($id);
        $validator = Validator::make($request->all(), [
            'location_type_id' => 'required',
            'address_line_1' => 'required',
            'name' => 'required',
            'state_id' => 'required',
            'postal_code' => 'required',
            'name' => 'required|unique:locations,name,'.$id.',id,deleted_at,NULL,location_type_id,'.$request->location_type_id,
            ])->validate();

            
            $location->name       = $request->name;
            $location->location_type_id      = $request->location_type_id;
            $location->address_line_1      = $request->address_line_1;
            $location->address_line_2      = $request->address_line_2;
            $location->land_mark      = $request->land_mark;
            $location->state_id      = $request->state_id;
            $location->district_id      = $request->district_id;
            $location->city_id      = $request->city_id;
            $location->postal_code      = $request->postal_code;
            $location->created_by = 0;
            $location->updated_by = 0;

            if ($location->save()) {
                return Redirect::back()->with('success', 'Successfully created');
            } else {
                return Redirect::back()->with('failure', 'Something Went Wrong..!');
            }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function destroy(Location $location,$id)
    {
        $location = location::find($id);
        if ($location->delete()) {
            return Redirect::back()->with('success', 'Deleted successfully');
        } else {
            return Redirect::back()->with('failure', 'Something Went Wrong..!');
        }
    }
}
