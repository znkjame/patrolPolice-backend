<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ReportResource;
use App\Models\Report;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reports = Report::get();
        return ReportResource::collection($reports);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $report = new Report();
        $report->note = $request->input('note');
        $report->assignment_id = $request->input('assignment_id');
        $report->red_box_id = $request->input('red_box_id');
        $report->save();
        return new ReportResource($report);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $report = Report::findOrFail($id);
        return new ReportResource($report);
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
        $report = Report::findOrFail($id);
        if($request->input('note')!= null)
        $report->note = $request->input('note');
        if($request->input('assignment_id')!= null)
        $report->assignment_id = $request->input('assignment_id');
        if($request->input('red_box_id')!= null)
        $report->red_box_id = $request->input('red_box_id');
        $report->save();
        return new ReportResource($report);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $report = Report::findOrFail($id);
        $report->delete();
        return new ReportResource($report);
    }
}
