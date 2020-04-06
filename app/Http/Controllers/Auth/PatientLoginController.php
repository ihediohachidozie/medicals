<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class PatientLoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:patient', ['except' => ['logout']]);
    }
    public function showLoginForm()
    {
        return view('auth.patient-login');
    }

    public function username()
    {
        $login = request()->input('username');
        
        $field = filter_var($login, FILTER_VALIDATE_EMAIL) ? 'email' : 'phone';

        request()->merge([$field => $login]);

        return $field;
    }

    public function login(Request $request)
    {
        // Validate the form data
        $this->validate($request, [
            'username' => 'required',
            'password' => 'required'
        ]);
        
        // Attempy to login the user in
        if($this->username() == 'email')
        {
            if(Auth::guard('patient')->attempt(['email' => $request->username, 'password' => $request->password], $request->remember))
            {
                // if successful, then redirect to their intended location
                return redirect()->intended(route('patient.dashboard'));
            }
            
        }
        else{
            
            if(Auth::guard('patient')->attempt(['phone' => $request->username, 'password' => $request->password], $request->remember))
            {
                // if successful, then redirect to their intended location
                return redirect()->intended(route('patient.dashboard'));
            }
        }

        return back()->withErrors(['username' => 'Invalid username', 'password' => 'Incorrect password']);

    }

    public function logout()
    {
        Auth::guard('patient')->logout();

        return redirect('/');
    }
}
