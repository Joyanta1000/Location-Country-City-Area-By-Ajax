<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\City;
use App\Models\Country;
use Illuminate\Http\Request;

class LocationController extends Controller
{

    public function index()
    {
        $countries = Country::has('city')->get();
        return view('Location.index', compact('countries'));
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
        //
    }

    public function show($id)
    {
        //
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