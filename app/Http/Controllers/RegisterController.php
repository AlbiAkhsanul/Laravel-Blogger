<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class RegisterController extends Controller
{
    public function create(){
        return view('register.index',[
            'activePage' => null,
            'title' => 'Register Page'
        ]);
    }

    public function store(Request $request){
        // Another method to accepting request
        // request()->all();
        $rules = [
            'email' => ['required','email:dns','max:45','unique:users,email'],
            'password' => [ 'required','max:20', Password::min(8)->letters()->numbers()->symbols()],
            'name' => ['required','max:45'],
            'username' => ['required','min:4','max:20','unique:users,username']
        ];

        $validatedData = $request->validate($rules);
        // $validatedData['password'] = bcrypt($validatedData['password']);
        $validatedData['password'] = Hash::make($validatedData['password']); //using build in function in laravel

        User::create($validatedData);

        return redirect('/login')->with('success', 'Registration Successfull! You Can Now login');
    }
}
