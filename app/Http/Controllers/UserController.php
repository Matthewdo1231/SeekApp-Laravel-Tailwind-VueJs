<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function create(){
        return view('users.sign-up-form');
    }

    public function login(){
        return view('users.login-form');
    }

    public function store(Request $request){
        $formInfos = $request -> validate([
            'name' => ['required','min:6'],
            'email' => ['required',Rule::unique('users','email')],
            'password' => ['required','confirmed','min:6']
        ]);

        $formInfos['password'] = bcrypt($formInfos['password']);

        $user = User::create($formInfos);
  
       Auth::login($user);

       return redirect('/');
    }

    public function authenticate(Request $request){
          $formFields = $request -> validate([
             'email' => ['required','email'],
             'password' => 'required',      
          ]);

          if(Auth::attempt($formFields)){
             $request -> session() -> regenerate();
             return redirect('/');
          };

          return redirect() -> back() -> 
          withErrors(['password' => 'Your email or password were incorrect']) ->
          onlyInput('password');
        }


    public function logout(Request $request){
            Auth::logout();
            
            $request -> session() -> invalidate();
            $request -> session() -> regenerate();

            return redirect('/');
        }
    }


  

      
