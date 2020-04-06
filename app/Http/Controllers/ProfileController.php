<?php

namespace App\Http\Controllers;

use App\Profile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $profile = Profile::where('patient_id', Auth::user()->id)->get();

        return view('patient.profile', compact('profile'));
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
        $data = request()->validate([
            'patient_id' => 'required',
            'dob' => 'sometimes',
            'gender' => 'sometimes',
            'address'=> 'sometimes',
            'env_allergies'=> 'sometimes',
            'food_allergies'=> 'sometimes',
            'drug_allergies'=> 'sometimes',
            'relationship'=> 'sometimes',
            'emg_name'=> 'sometimes',
            'emg_phone'=> 'sometimes',
            'phone'=> 'sometimes',
            'blood_group'=> 'sometimes',
            'marital_status'=> 'sometimes',
            'religion'=> 'sometimes',
            'lga' => 'sometimes',
            'state' => 'sometimes',
            'country' => 'sometimes',
            'qualification' => 'sometimes',
            'offaddress' => 'sometimes',
            'relationship1'=> 'sometimes',
            'emg_name1'=> 'sometimes',
            'emg_phone1'=> 'sometimes',
            'relationship2'=> 'sometimes',
            'emg_name2'=> 'sometimes',
            'emg_phone2'=> 'sometimes',
        ]);
        
        $patientdata = request()->validate([
            'firstname' => 'required|string',
            'lastname' => 'required|string',
            'phone' => 'required|string|unique:patients'.$patient->id,
            'national_id' => 'sometimes'
        ]);

        $patient = Patient::find(Auth::user()->id());

        $profile = Profile::where('patient_id', Auth::user()->id)->count();

        if($profile == 0)
        {
            // store patient profile

            $patient->update($patientdata);

            Profile::create($data);

        }else{
            // update patient profile
            
            $patient->update($patientdata);

            $profile->update($data);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function show(Profile $profile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function edit(Profile $profile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Profile $profile)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function destroy(Profile $profile)
    {
        //
    }
}
