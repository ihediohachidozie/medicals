<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Auth;
use App\Patient;
use App\Profile;


class PatientRegisterController extends Controller
{

    public function showRegistrationForm()
    {
        return view('auth.patient-register');

    }

    public function register(Request $request)
    {
        $data = request()->validate([
            'firstname' => ['required', 'string', 'max:255'],
            'middlename' => ['sometimes', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'unique:patients'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:patients'],
            //'national_id' => ['required', 'numeric', 'unique:patients'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $user = Patient::create([
            'firstname' => $data['firstname'],
            'middlename' => $data['middlename'],
            'lastname' => $data['lastname'],
            'phone' => $data['phone'],
           // 'national_id' => $data['national_id'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        $profile = new Profile();
        $profile->patient_id = $user->id;

        $profile->save();

        Auth::guard('patient')->login($user);

        return redirect()->intended(route('patient.dashboard'));

    }
}
