<?php

namespace App\Http\Controllers;

use App\Laboratory;
use Auth;
use Illuminate\Http\Request;

class LaboratoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:practitioner');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $labtests = Laboratory::whereNull('test_result')->get();

        return view('lab.tests', compact('labtests'));
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
     * @param  \App\Laboratory  $laboratory
     * @return \Illuminate\Http\Response
     */
    public function show(Laboratory $laboratory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Laboratory  $laboratory
     * @return \Illuminate\Http\Response
     */
    public function edit($laboratory)
    {
        //
        $laboratory = Laboratory::find($laboratory)->get();
        return view('lab.viewtest', compact('laboratory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Laboratory  $laboratory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $laboratory)
    {
        //
        //dd($laboratory);
        $lab = Laboratory::find($laboratory);

        $lab->lab_tech_id = Auth::user()->id;
        $lab->test_result = request('test_result');
        $lab->save();

        return back()->withStatus(__('Tests Result saved'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Laboratory  $laboratory
     * @return \Illuminate\Http\Response
     */
    public function destroy(Laboratory $laboratory)
    {
        //
    }
}
