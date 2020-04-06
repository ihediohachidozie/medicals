<?php

namespace App\Http\Controllers;

use App\Consultancy;
use App\Patient;
use App\Pharmacy;
use App\Laboratory;
use Auth;

use Illuminate\Http\Request;

class ConsultancyController extends Controller
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
        /// patient bookings ....
        $consults = Consultancy::where(['status' => 0, 'nurse_id' => null])->get();

        return view('practitioner.bookings', compact('consults'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // admitted patients ....
        $consults = Consultancy::where('status', 0)->whereNotNull('nurse_id')->get();

        return view('practitioner.consult', compact('consults'));
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
     * @param  \App\Consultancy  $consultancy
     * @return \Illuminate\Http\Response
     */
    public function show(Consultancy $consultancy)
    {
        //
        $labtests = Laboratory::where('consultancy_id', $consultancy->id)->get();

        $pharms = Pharmacy::where('consultancy_id', $consultancy->id)->get();

        return view('practitioner.consulting', compact('consultancy', 'labtests', 'pharms'));
    }

    public function medHistory(Consultancy $consultancy)
    {
        //
        $labtests = Laboratory::where('consultancy_id', $consultancy->id)->get();

        $pharms = Pharmacy::where('consultancy_id', $consultancy->id)->get();

        return view('patient.viewhistory', compact('consultancy', 'labtests', 'pharms'));
    }

    public function lab(Consultancy $consultancy)
    {
        //
        $labtests = Laboratory::where('consultancy_id', $consultancy->id)->get();

        return view('practitioner.labtest', compact('consultancy', 'labtests'));
    }

    public function pharm(Consultancy $consultancy)
    {
        //
        $pharms = Pharmacy::where('consultancy_id', $consultancy->id)->get();
        
        return view('practitioner.pharmacy', compact('consultancy', 'pharms'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Consultancy  $consultancy
     * @return \Illuminate\Http\Response
     */
    public function edit(Consultancy $consultancy)
    {
        //
        return view('practitioner.admitpatient', compact('consultancy'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Consultancy  $consultancy
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Consultancy $consultancy)
    {
        //
       // dd(request('temp'));
        if (request('activity') == 'nurse') {
            # code...
            $data = request()->validate([
                'bp' => 'required|numeric',
                'pulse' => 'required|numeric',
                'temp' => 'required|numeric',
                'weight' => 'required|numeric',
                'height' => 'required|numeric',
                'nurse_id' => 'required'
            ]);

            $consultancy->update($data);


        } else if(request('activity') == 'doctor'){
            # code...
            //dd($request->all());
            $data = request()->validate([
                'condition' => 'sometimes',
                'complain' => 'sometimes',
                'symptoms' => 'sometimes',
                'diagnosis' => 'sometimes',
                'remarks' => 'sometimes',
                
            ]);
            $consultancy->update($data);
        }

        if (request('test_sample') || request('test_required')) {
            # code for laboratory test requirement
            $lab = new Laboratory();

            $lab->consultancy_id = $consultancy->id;
            $lab->test_sample = request('test_sample');
            $lab->test_required = request('test_required');
            $lab->doctor_id = $consultancy->doctor_id;
            $lab->patient_id = $consultancy->patient_id;

            $lab->save();

        }

        if (request('prescription')) {
            # code for drug prescriptions
            $pharm = new Pharmacy();

            $pharm->consultancy_id = $consultancy->id;
            $pharm->prescription = request('prescription');
            $pharm->doctor_id = $consultancy->doctor_id;
            $pharm->patient_id = $consultancy->patient_id;

            $pharm->save();

        }

        
        return back()->withStatus(__("Patient's data saved!"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Consultancy  $consultancy
     * @return \Illuminate\Http\Response
     */
    public function destroy(Consultancy $consultancy)
    {
        //
        //dd('I want to discharge a patient');

        $consultancy->status = 1;

        $consultancy->save();

        return back();
    }

    public function history()
    {
        $consults = Consultancy::where( 'status', 1)->get();

        return view('practitioner.history', compact('consults'));
    }
    public function viewHistory($id)
    {
        //
        $consults = Consultancy::where([
            [ 'status', '=', 1], 
            ['id', '=', $id]
            
        ])->get();

        $labtests = Laboratory::where('consultancy_id', $consults[0]->id)->get();

        $pharms = Pharmacy::where('consultancy_id', $consults[0]->id)->get();

        return view('practitioner.viewhistory', compact('consults', 'labtests', 'pharms'));
    }
}
