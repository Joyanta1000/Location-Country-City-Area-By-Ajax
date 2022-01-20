<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\City;
use App\Models\Country;
use App\Models\Location;
use Illuminate\Http\Request;

class LocationController extends Controller
{

    public function index()
    {
        $countries = Country::has('city')->get();
        $cntry = Country::has('city')->get();
        $cty = City::has('area')->get();
        $areas = Area::all();
        return view('Location.index', compact('countries', 'cntry', 'cty', 'areas'));
    }

    public function show(){
        $cntry = Country::has('city')->get();
        $cty = City::has('area')->get();
        $areas = Area::all();
        return response()->json(['cntry' => $cntry, 'cty' => $cty, 'areas' => $areas]);
    }

    public function city(City $city)
    {
        $cities = $city->has('area')->where('countryid', request()->get('countryid'))->get();
        return response()->json($cities);
    }

    public function area(Area $area)
    {
        $areas = $area->where('cityid', request()->get('cityid'))->get();
        return response()->json($areas);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $location = Location::create([
            'countryid' => $request->countryid,
            'cityid' => $request->cityid,
            'areaid' => $request->areaid,
        ]);
        if ($location) {
            return response()->json(['success' => 'Location Added Successfully']);
        }
        else{
            return response()->json(['error' => 'Something went wrong']);
        }
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
