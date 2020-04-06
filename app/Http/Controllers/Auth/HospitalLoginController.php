<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class HospitalLoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:hospital', ['except' => ['logout']]);
    }

    public function showLoginForm()
    {
        return view('auth.hospital-login');
    }

    public function username()
    {
        $login = request()->input('username2');
        
        $field = filter_var($login, FILTER_VALIDATE_EMAIL) ? 'email' : 'phone';

        request()->merge([$field => $login]);

        return $field;
    }

    public function login(Request $request)
    {
        // Validate the form data
        $this->validate($request, [
            'username2' => 'required',
            'password2' => 'required'
        ]);
        
        // Attempy to login the user in
        if($this->username() == 'email')
        {
            if(Auth::guard('hospital')->attempt(['email' => $request->username2, 'password' => $request->password2], $request->remember))
            {
                // if successful, then redirect to their intended location
                return redirect()->intended(route('hospital.dashboard'));
            }
            
        }
        else{

            if(Auth::guard('hospital')->attempt(['phone' => $request->username2, 'password' => $request->password2], $request->remember))
            {
                // if successful, then redirect to their intended location
                return redirect()->intended(route('hospital.dashboard'));
            } 
        }

        return back()->withErrors(['username2' => 'Invalid username', 'password2' => 'Incorrect password']);

    }
    public function logout()
    {
        Auth::guard('hospital')->logout();

        return redirect('/');
    }
}
