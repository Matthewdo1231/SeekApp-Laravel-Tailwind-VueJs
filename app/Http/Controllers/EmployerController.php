<?php

namespace App\Http\Controllers;


use App\Models\Employer;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

class EmployerController extends Controller
{
    public function create(){
        return view('employer.sign-up-form');
    }

    public function login(){
        return view('employer.login-form');
    }

    public function store(Request $request){
        $formFields = $request -> validate([
            'name' => ['required','min:6'],
            'email' => ['required',Rule::unique('employers','email')],
            'password' => ['required','min:6'],
        ]);

        $formFields['password'] = bcrypt($formFields['password']);

        $formFields = Employer::create($formFields);

        Auth::guard('employer') -> login($formFields);
        
        return redirect('/employer');
    }

    public function authenticate(Request $request){
        $formFields = $request -> validate([
               'email' => ['required','email'],
               'password' => 'required'
        ]);

        if(Auth::guard('employer')->attempt($formFields)){
            $request -> session() -> regenerate();
  
            //create Token for current authenticated employer
            $authEmployer = Auth::guard('employer')->user();
            $employer = Employer::find($authEmployer->id);
            $token = $employer->createToken('auth_token')->plainTextToken;
            $employer -> update([
                'remember_token' => $token,
            ]);
            Cookie::queue(Cookie::make('cookie_name', $token, 60));
            return redirect('/employer');
        }
       return redirect() -> back() -> withErrors(['password' => 'Your email or password were incorrect']) -> onlyInput('password');
    }

    public function logout(Request $request){
        Auth::guard('employer')->logout();

        $request -> session() -> invalidate();
        $request -> session() -> regenerate();

        return redirect('/');
    }
   
}
