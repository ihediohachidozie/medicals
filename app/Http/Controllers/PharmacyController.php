<?php

namespace App\Http\Controllers;

use App\Pharmacy;
use Auth;
use Illuminate\Http\Request;

class PharmacyController extends Controller
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
        $pharms = Pharmacy::whereNull('drugs')->get();

        return view('pharm.prescriptions', compact('pharms'));
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
     * @param  \App\Pharmacy  $pharmacy
     * @return \Illuminate\Http\Response
     */
    public function show(Pharmacy $pharmacy)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pharmacy  $pharmacy
     * @return \Illuminate\Http\Response
     */
    public function edit($pharmacy)
    {
        $pharmacy = Pharmacy::find($pharmacy)->get();
        return view('pharm.issuedrug', compact('pharmacy'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pharmacy  $pharmacy
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $pharmacy)
    {
        //
       // dd($pharmacy);
        
        $pharm = Pharmacy::find($pharmacy);

        $pharm->pharmacist = Auth::user()->id;
        $pharm->drugs = request('drugs');
        $pharm->save();

        return back()->withStatus(__('Drugs Issued'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pharmacy  $pharmacy
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pharmacy $pharmacy)
    {
        //
    }
}
