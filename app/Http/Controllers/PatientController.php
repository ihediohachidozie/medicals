<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Profile;
use App\Patient;
use App\Hospital;
use App\Practitioner;
use App\Consultancy;
use App\Pharmacy;
use App\Laboratory;
use Illuminate\Support\Facades\Mail;
use App\Mail\DoctorNotification;
use App\Mail\PatientBooking;



class PatientController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:patient');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('patient-home');  
    }

    private function profile()
    {
        return Profile::where('patient_id', Auth::user()->id)->get();    
    }

    public function patientProfile()
    {
        $profile = $this->profile();
        $gender = $this->gender();
        $mstatus = $this->mstatus();
        $religion = $this->religion();
        $language = $this->language();
        $relationship = $this->relationship();
        $bloodgroup = $this->bloodgroup();
        $genotype = $this->genotype();
        $state = $this->state();

       // $patient = Patient::findorFail(Auth::)

        return view('patient.profile', compact('profile', 'gender', 'mstatus', 'religion', 'language', 'relationship', 'bloodgroup', 'genotype', 'state'));
    }
    private function gender()
    {
        return array('Male','Female');
    }
    private function genotype()
    {
        return array('AA','AO', 'BB', 'BO', 'AB', 'OO');
    }
    private function bloodgroup()
    {
        return array('A Positive','B Positive', 'O Positive', 'AB Positive');
    }
    private function mstatus()
    {
        return array('Single','Married', 'Widowed');
    }
    private function relationship()
    {
        return array('Parent', 'Sibling', 'Friend', 'Child' );
    }
    private function religion()
    {
        return array('Christianity','Islam', 'Non-religious', 'Hinduism', 'Buddhism');
    }
    private function language()
    {
        return array('Igbo','Urhobo', 'Hausa', 'Yoruba', 'Ibibio', 'Fulfulde', 'Edo', 'Ijaw', 'Kanuri', 'Tiv', 'Efik');
    }
    private function state()
    {
        return array('Abia','Adamawa', 'Akwa Ibom', 'Anambra', 'Bauchi', 'Bayelsa', 'Benue', 'Borno', 'Cross River', 'Delta', 'Ebonyi', 'Enugu', 'Edo', 'Ekiti', 'Gombe', 'Imo', 'Jigawa', 'Kanduna', 'Kano', 'Katsina', 'Kebbi', 'Kogi', 'Kwara', 'Lagos', 'Nasarawa', 'Niger', 'Ogun', 'Ondo', 'Osun', 'Oyo', 'Plateau', 'Rivers', 'Sokoto', 'Taraba', 'Yobe', 'Zamfara', 'FCT');
    }
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
            'blood_group'=> 'sometimes',
            'genotype'=> 'sometimes',
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


        $patient = Patient::find($request->patient_id);

        $patientdata = request()->validate([
            'firstname' => 'required|string',
            'middlename' => 'sometimes|string',
            'lastname' => 'required|string',
            'phone' => 'required|string|unique:patients,'.$patient->id,
        ]);


        $profile = Profile::find($request->profile_id);
        
        $patient->update($patientdata);
        $profile->update($data);


        return back()->withStatus(__('Patient Profile Updated'));
    }
    public function booking()
    {
        // list of hospitals
        $hospitals = Hospital::get();

        $num = Practitioner::where('profession', 1)->count();

        return view('patient.booking', compact('hospitals', 'num'));
    }
    private function specialty()
    {
        return array('Family Medicine','Emergency Medicine','General Surgery','General Practitoner','Preventive Healthcare');
    }
    private function profession()
    {
        return array('Nurse','Physician','Lab. Tech','Pharmacy');
    }
    public function getDoctors($id)
    {
        $specialty = $this->specialty();

        $profession = $this->profession();

        $doctors = Practitioner::where(['hospital_id' => $id, 'profession' => 1])->get();

        return view('patient.hospital', compact('doctors', 'profession', 'specialty'));
    }

    public function bookDoctor($id)
    {
        $consultancy = new Consultancy();

        $consultancy->patient_id = Auth::user()->id;

        $consultancy->doctor_id = $id;

        $consultancy->save();

        $doctor = Practitioner::find($id);

        $when = now()->addMinutes(10);

        $patient = Patient::find(Auth::user()->id);
        
        //Mail::to($practitioner->email)->later($when, new PractitionerLoginDetails($password, $fullname, $phone, $email, $hospital_email));

        // Notify the doctor of this appointment through email
      //  Mail::to($doctor->email)->later($when, new DoctorNotification($doctor));

        // Receive a mail confirmation about on this doctor's appointment
        // Mail::to($patient->email)->later($when, new PatientBooking($doctor));

        return back()->withStatus(__("Doctor's Appointment booked!"));


        
    }

    public function getHistory()
    {
        $consults = Consultancy::where(['patient_id' => Auth::user()->id, 'status' => 1])->get();

        return view('patient.medhistory', compact('consults'));
    }
    public function medHistory($id)
    {
        //
        $consults = Consultancy::where([
            ['patient_id', '=', Auth::user()->id],
            [ 'status', '=', 1], 
            ['id', '=', $id]
            
        ])->get();

        $labtests = Laboratory::where('consultancy_id', $consults[0]->id)->get();

        $pharms = Pharmacy::where('consultancy_id', $consults[0]->id)->get();

        return view('patient.viewmedhistory', compact('consults', 'labtests', 'pharms'));
    }
}  
