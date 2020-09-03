<?php

namespace App\Http\Controllers\Station;

use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StationController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stations = DB::table(
            'stations')->select(
                'stations.name as station',
                'wards.name AS ward',
                'areas.name AS area',
                'municipalities.name AS municipality',
                'provinces.name AS province',
                'stations.id AS stationID')
            ->join('wards', 'stations.ward_id', '=', 'wards.id')
            ->join('areas', 'wards.area_id', '=', 'areas.id')
            ->join('municipalities', 'areas.municipality_id', '=', 'municipalities.id')
            ->join('provinces', 'municipalities.province_id', '=', 'provinces.id')
            ->orderBy('stations.name', 'asc')
            ->get();

        return response()->json(['data' => $stations], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
