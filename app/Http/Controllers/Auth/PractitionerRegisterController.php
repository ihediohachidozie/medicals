<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Auth;
use App\Practitioner;

class PractitionerRegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('auth.practitioner-register');

    }

    public function register(Request $request)
    {
      //  dd($request);
        $data = request()->validate([
            'firstname' => ['required', 'string', 'max:255'],
            'middlename' => ['sometimes', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'unique:practitioners'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:practitioners'],
           // 'national_id' => ['required', 'numeric', 'unique:practitioners'],
            'profession' => ['required', 'numeric'],
            'specialty' => ['required', 'numeric'],
            'license' => ['required', 'numeric'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $practitioner = Practitioner::create([
            'firstname' => $data['firstname'],
            'middlename' => $data['middlename'],
            'lastname' => $data['lastname'],
            'phone' => $data['phone'],
          //  'national_id' => $data['national_id'],
            'email' => $data['email'],
            'profession' => $data['profession'],
            'specialty' => $data['specialty'],
            'license' => $data['license'],
            'password' => Hash::make($data['password']),
        ]);

        Auth::guard('practitioner')->login($practitioner);

        return redirect()->intended(route('practitioner.dashboard'));

    }
}
