<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Models\User;
use Hash;
use App\Mail\verifyEmail;

class RegisterController extends Controller
{
    public function register_form(){
        return view('auth.register');
    }

    public function register(Request $request){
        $request->validate(
            [
                'name'=>'required',
                'address'=>'required',
                'phone'=>'required',
                'email'=>'required|email|unique:users',
                'password'=>'required|min:5|max:15|confirmed',


            ]
            );

            $data['name'] = $request->name;
            $data['address'] = $request->address;
            $data['phone'] = $request->phone;
            $data['email'] = $request->email;
            $data['password'] = Hash::make($request->password);
            $user = User::create($data);

            $mail= $request->email;

            if(!$user){
                return redirect(route('register'))->with('error','register failed');
            }
            else{
                Mail::to($mail)->send(new verifyEmail($user));
                return redirect(route('loginget'))->with('success','registration success');

            }
    }

}
