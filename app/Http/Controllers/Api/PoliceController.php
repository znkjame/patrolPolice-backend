<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PoliceResource;
use App\Models\Police;
use Illuminate\Http\Request;

class PoliceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $police = Police::get();
        return PoliceResource::collection($police);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $police = new Police();
        $police->firstname = $request->input('firstname');
        $police->lastname = $request->input('lastname');
        $police->phone = $request->input('phone');
        $police->rank = $request->input('rank');
        $police->user_id = $request->input('user_id');
        $police->save();
        return new PoliceResource($police);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $police = Police::findOrFail($id);
        return new PoliceResource($police);
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
        $police = Police::findOrFail($id);
        if($request->input('firstname')!= null)
        $police->firstname = $request->input('firstname');
        if($request->input('lastname')!= null)
        $police->lastname = $request->input('lastname');
        if($request->input('phone')!= null)
        $police->phone = $request->input('phone');
        if($request->input('rank')!= null)
        $police->rank = $request->input('rank');
        $police->save();
        return new PoliceResource($police);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $police = Police::findOrFail($id);
        $police->delete();
        return new PoliceResource($police);
    }
}
