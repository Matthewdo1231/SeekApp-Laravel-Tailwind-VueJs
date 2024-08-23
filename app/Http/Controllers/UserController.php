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
}
