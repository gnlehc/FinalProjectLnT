<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
class SessionCtrl extends Controller
{
    public function home(){
        return view('home');
    }
    public function dashboard(){
        return view('dashboard');
    }
    public function indexRegist(){
        return view('register');
    }
    public function indexLogin(){
        return view('login');
    }

    public function indexUser(){
        return view('user');
    }
    public function dual(){
        return view('account');
    }
    function login(Request $request){
        Session::flash('Email', $request->Email);
        $request->validate([
            'Email' => 'required',
            'password' => 'required',
        ],
        [
            'Email.required' => 'Email cannot be empty',
            'password.required' => 'Password cannot be empty',
        ]);

        $infoLogin = [
            'Email' => $request->Email,
            'password' => $request->password
        ];

        if(Auth::attempt($infoLogin)){
            return redirect('Products')->with("Welcome");
        }else{
            return redirect('account')->withErrors('Email or Password does not valid');
        }
    }

    function logout(){
        Auth::logout();
        return redirect('account')->with("See you!");
    }

    function create(Request $request){
        Session::flash('Name', $request->Name);
        Session::flash('Email', $request->Email);
        $request->validate([
            'Name' => 'required',
            'Email' => 'required|Email|unique:users',
            'TLP' => 'required|unique:users',
            'password' => 'required|min:6',
        ],
        [
            'Name.required' => 'Name cannot be empty',
            'Email.required' => 'Email cannot be empty',
            'Email.Email' => "Enter Valid Email",
            'Email.unique' => "Email are already been taken",
            'password.required' => 'Password cannot be empty',
        ]);

        $account = [
            'Name' => $request->Name,
            'Email' => $request->Email,
            'TLP' => $request->TLP,
            'password' => Hash::make($request->password),
        ];
        User::create($account);
        $infoLogin = [
            'Email' => $request->Email,
            'password' => $request->password
        ];
        if(Auth::attempt($infoLogin)){
            return redirect('account')->with("Welcome", Auth::user()-> Name);
        }else{
            return redirect('register')->withErrors('Email or Password does not valid');
        }
    }
    public function showData(){
        $users = User::all();
        return view('dashboard', compact('users'));
    }

    public function edit($id){
        $users = User::findOrFail($id);
        return view('editData', compact('users'));
    }
    public function update(Request $request, $id){
        User::findOrFail($id)->update([
            'Name' => $request->Name,
            'Email' => $request->Email,
            'TLP' => $request->TLP,
            'password' => $request->password,
        ]);
        return redirect('/dashboard');
    }
    public function delete($id){
        User::destroy($id);
            return redirect('dashboard');
    }
}
