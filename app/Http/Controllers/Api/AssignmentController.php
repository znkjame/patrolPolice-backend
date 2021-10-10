<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\AssignmentResource;
use App\Models\Assignment;
use Illuminate\Http\Request;

class AssignmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $assignments = Assignment::with('commander','patrol','redBox','reports')->get();
        return AssignmentResource::collection($assignments);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $assignment = new Assignment();
        $assignment->detail = $request->input('detail');
        $assignment->time = $request->input('time');
        $assignment->commander_id = $request->input('commander_id');
        $assignment->patrol_id = $request->input('patrol_id');
        $assignment->red_box_id = $request->input('red_box_id');
        $assignment->status = $request->input('status');
        $assignment->save();
        return new AssignmentResource($assignment);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $assignment = Assignment::with('commander','patrol','redBox','reports')->findOrFail($id);
        return new AssignmentResource($assignment);
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
        $assignment = new Assignment();
        if($request->input('detail') != null)
        $assignment->detail = $request->input('detail');
        if($request->input('time') != null)
        $assignment->time = $request->input('time');
        if($request->input('commander_id') != null)
        $assignment->commander_id = $request->input('commander_id');
        if($request->input('patrol_id') != null)
        $assignment->patrol_id = $request->input('patrol_id');
        if($request->input('red_box_id') != null)
        $assignment->red_box_id = $request->input('red_box_id');
        if($request->input('status') != null)
        $assignment->status = $request->input('status');
        $assignment->save();
        return new AssignmentResource($assignment);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $assignment = Assignment::findOrFail($id);
        $assignment->delete();
        return new AssignmentResource($assignment);
    }
}
