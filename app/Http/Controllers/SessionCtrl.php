<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\MessageBag;
use Validator;
class SessionCtrl extends Controller
{
    public function home(){
        return view('home');
    }
    public function dashboard(){
        return view('dashboard');
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
        // $errors = new MessageBag;
        $request->validate([
            'Email' => 'required|exists:Users,Email|ends_with:@gmail.com',
            'password' => 'required|min:6|max:12',
            // 'password' => 'required|min:6|max:12|confirmed',
        ],
        [
            'Email.required' => 'Email cannot be empty',
            'password.required' => 'Password cannot be empty',
            'password.min' => 'Password must be atleast 6 char',
            'password.max' => 'Password maximum 12 char',
            'Email.exists' => 'There is no Account with this Email',
            'password.confirmed' => 'Email or Password Invalid',
        ]);

        $infoLogin = [
            'Email' => $request->Email,
            'password' => $request->password
        ];

        if(Auth::attempt($infoLogin)){
            return redirect('Products')->with("Welcome");
        }else{
            // $errors = new MessageBag(['password' => ['Email Or Password Invalid']]);
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
            'Name' => 'required|min:3|max:40',
            'Email' => 'required|Email|unique:users|ends_with:@gmail.com',
            'TLP' => 'required|unique:users|starts_with:0,8',
            'password' => 'required|min:6|max:12',
        ],
        [
            'Name.required' => 'Name cannot be empty',
            'Name.min' => 'Name must be atleast 3 char',
            'Name.max' => 'Name maximum length 40 char',
            'Email.required' => 'Email cannot be empty',
            'Email.Email' => "Enter Valid Email",
            'Email.unique' => "Email are already been registered",
            'password.required' => 'Password cannot be empty',
            'TLP.starts_with' => 'Telephone Number Must Be Starts With 08',
            'password.min' => 'Password must be atleast 6 char',
            'password.max' => 'Password maximum 12 char',
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
        }
        // if ($infoLogin && !\Hash::check($request->password, $infoLogin->password)) {
        //     $errors = ['password' => 'Wrong password'];
        // }
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
