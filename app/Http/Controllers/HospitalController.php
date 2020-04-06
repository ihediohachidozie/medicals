<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use App\Mail\PractitionerLoginDetails;
use Illuminate\Support\Str;

use App\Practitioner;
use Auth;
class HospitalController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:hospital');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('hospital-home');
    }

    private function specialty()
    {
        return array('Family Medicine','Emergency Medicine','General Surgery','General Practitoner','Preventive Healthcare');
    }
    private function profession()
    {
        return array('Nurse','Physician','Lab. Tech','Pharmacy');
    }
    public function showAddPractitionerForm()
    {
        $specialty = $this->specialty();
        $profession = $this->profession();
        return view('hospital.addPractitioner', compact('specialty', 'profession'));
    }
    public function showEditPractitionerForm($id)
    {
        $specialty = $this->specialty();
        $profession = $this->profession();
        $practitioner = Practitioner::where('id', $id)->get();
        //dd($practitioner);
        return view('hospital.editPractitioner', compact('practitioner', 'specialty', 'profession'));
    }
    public function showListPractitioner()
    {
        $practitioners = Practitioner::where('hospital_id', Auth::user()->id)->get();
      //  dd($practitioners);
        return view('hospital.listPractitioners', compact('practitioners'));
    }
    public function store(Request $request)
    {
        $data = request()->validate([
            'firstname' => ['required', 'string', 'max:255'],
            'middlename' => ['sometimes', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'unique:practitioners'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:practitioners'],
            'national_id' => ['required', 'numeric', 'unique:practitioners'],
            'profession' => ['required', 'numeric'],
            'specialty' => ['required', 'numeric'],
            'license' => ['required', 'numeric'],
        ]);
        $password = Str::random(8);

        $hospital_email = Auth::user()->email;

        $practitioner = Practitioner::create([
            'firstname' => $data['firstname'],
            'middlename' => $data['middlename'],
            'lastname' => $data['lastname'],
            'phone' => $data['phone'],
            'national_id' => $data['national_id'],
            'email' => $data['email'],
            'profession' => $data['profession'],
            'specialty' => $data['specialty'],
            'license' => $data['license'],
            'hospital_id' => Auth::user()->id,
            'password' => Hash::make($password),
        ]);


        $phone = $data['phone'];
        $email = $data['email'];
        $fullname = $practitioner->firstname . ' ' . $practitioner->lastname;
        $when = now()->addMinutes(10);

           
        //    send an mail to the practitioner containing login details
      //  Mail::to($practitioner->email)->later($when, new PractitionerLoginDetails($password, $fullname, $phone, $email, $hospital_email));
               

        return back()->withStatus(__('Practitioner successfully saved. Practitioner can login phone '.$phone.' & password '.$password));
    }
    public function update(Request $request, $id)
    {
        $practitioner = Practitioner::Find($id); 

        $data = request()->validate([
            'firstname' => ['required', 'string', 'max:255'],
            'middlename' => ['sometimes', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'unique:practitioners,'.$practitioner->id],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:practitioners,'.$practitioner->id],
            'national_id' => ['required', 'numeric', 'unique:practitioners,'.$practitioner->id],
            'profession' => ['required', 'numeric'],
            'specialty' => ['required', 'numeric'],
            'license' => ['required', 'numeric'],
        ]);

        

        $practitioner->firstname = request('firstname');
        $practitioner->lastname = request('lastname');
        $practitioner->middlename = request('middlename');
        $practitioner->phone = request('phone');
        $practitioner->national_id = request('national_id');
        $practitioner->email = request('email');
        $practitioner->profession = request('profession');
        $practitioner->specialty = request('specialty');
        $practitioner->license = request('license');

        $practitioner->update();
        
        

        return back()->withStatus(__('Practitioner successfully updated.'));
    }

    public function destroy($id)
    {
        $practitioner = Practitioner::Find($id); 
        $practitioner->delete(); 
        return back()->withStatus(__('Practitioner successfully deleted.'));
    }

}
