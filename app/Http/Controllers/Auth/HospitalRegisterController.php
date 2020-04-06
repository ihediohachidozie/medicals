<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Hospital;
use Auth;
 
class HospitalRegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('auth.hospital-register');
 
    }

    public function register(Request $request)
    {
        $data = request()->validate([
            'name' => 'required|string|max:255',
            'othernames' => 'sometimes|string|max:255',
            'country' => 'required|string|max:255',
            'phone' => 'required|string|unique:hospitals',
            'email' => 'required|email|unique:hospitals',
            'tin' => 'required|string|unique:hospitals',
            'state' => 'required|string',
            'lga' => 'required|string',
            'contact_phone' => 'sometimes|string',
            'emg_phone1' => 'sometimes|string',
            'emg_phone2' => 'sometimes|string',
            'postal' => 'sometimes|string',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $hospital = Hospital::create([
            'name' => $data['name'],
            'othernames' => $data['othernames'],
            'country' => $data['country'],
            'phone' => $data['phone'],
            'tin' => $data['tin'],
            'email' => $data['email'],
            'state' => $data['state'],
            'lga' => $data['lga'],
            'contact_phone' => $data['phone'],
            'emg_phone1' => $data['emg_phone1'],
            'emg_phone2' => $data['emg_phone2'],
            'postal' => $data['postal'],
            'password' => Hash::make($data['password']),
        ]);

        Auth::guard('hospital')->login($hospital);
 
        return redirect()->intended(route('hospital.dashboard'));

    }
}
