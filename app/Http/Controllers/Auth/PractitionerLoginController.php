<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class PractitionerLoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:practitioner', ['except' => ['logout']]);
    }

    public function showLoginForm()
    {
        return view('auth.practitioner-login');
    }

    public function username()
    {
        $login = request()->input('username1');
        
        $field = filter_var($login, FILTER_VALIDATE_EMAIL) ? 'email' : 'phone';

        request()->merge([$field => $login]);

        return $field;
    }

    public function login(Request $request)
    {
        // Validate the form data
        $this->validate($request, [
            'username1' => 'required',
            'password1' => 'required'
        ]);
        
        // Attempy to login the user in
        if($this->username() == 'email')
        {
            if(Auth::guard('practitioner')->attempt(['email' => $request->username1, 'password' => $request->password1], $request->remember))
            {
                // if successful, then redirect to their intended location
                return redirect()->intended(route('practitioner.dashboard'));
            }
            
        }
        else{

            if(Auth::guard('practitioner')->attempt(['phone' => $request->username1, 'password' => $request->password1], $request->remember))
            {
                // if successful, then redirect to their intended location
                return redirect()->intended(route('practitioner.dashboard'));
            } 
        }

        return back()->withErrors(['username1' => 'Invalid username', 'password1' => 'Incorrect password']);

    }
    public function logout()
    {
        Auth::guard('practitioner')->logout();

        return redirect('/');
    }
}
