<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;

Use App\User;

class AuthController extends Controller
{
    public function index(){
        if(auth()->user()){
            return redirect('/dashboard');
        } else {
            return view('index');
        }
    }

    public function login(Request $request){
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        if(Auth::attempt($request->only('username', 'password'))){
            if ($request->password == 12345){
                return redirect('/password');
            } else {
                return redirect('/dashboard');
            }
        } else {
            return redirect('/');
        }
    }

    public function password(){
        return view('password');
    }

    public function change(Request $request){
        $request->validate([
            'password' => 'required',
            'password1' => 'required|same:password2',
            'password2' => 'required|same:password1'
        ]);

        if ($request->password != 12345){
            return redirect('/password');
        } else {
            User::where('id', auth()->user()->id)->update([
                'password' => bcrypt($request->password1)
            ]);

            Auth::logout();
            return redirect('/');
        }
    }

    public function logout(){
        Auth::logout();
        return redirect('/');
    }
}
