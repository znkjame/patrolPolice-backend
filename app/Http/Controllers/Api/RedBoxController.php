<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\RedBoxResource;
use App\Models\RedBox;
use Illuminate\Http\Request;

class RedBoxController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $redBoxs = RedBox::with('assignments','reports')->get();
        return RedBoxResource::collection($redBoxs);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $redBox = new RedBox();
        $redBox->name = $request->input('name');
        $redBox->latitude = $request->input('latitude');
        $redBox->longitude = $request->input('longitude');
        $redBox->save();
        return new RedBoxResource($redBox);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $redBox = RedBox::with('assignments')->findOrFail($id);
        return  new RedBoxResource($redBox);
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
        $redBox = RedBox::findOrFail($id);
        if($request->input('name')!= null)
        $redBox->name = $request->input('name');
        if($request->input('latitude')!= null)
        $redBox->latitude = $request->input('latitude');
        if($request->input('longitude')!= null)
        $redBox->longitude = $request->input('longitude');
        $redBox->save();
        return new RedBoxResource($redBox);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $redBox = RedBox::findOrFail($id);
        $redBox->delete();
        return new RedBoxResource($redBox);
    }

    public function getRedBoxWithReportAfter(Request $request){

    }
}
