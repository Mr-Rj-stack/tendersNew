<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Tender;
use Session;
use Hash;

class LoginController extends Controller
{
    public  function login_form(){

        return view('auth.login');
    }

    public function login(Request $request){
        $request->validate(
            [
                'email'=>'required',
                'password'=>'required'
            ]
            );
            $email=$request->input('email');
            $password=$request->input('password');


            if(Auth::attempt(['email'=>$email,'password'=>$password])){
                $user=User::where('email',$email)->first();
                $check=$user->usertype;
                if($check=="user"){

                    $request->session()->put('userId',$user->id);
                    return redirect()->intended(route('index'));

                }
                elseif($check=="admin"){
                    $request->session()->put('adminId',$user->id);
                    return redirect(route('adminlogin'));

                }

            }

            else{
            return redirect(route('loginget'))->with('fail',"login details are not valid");}

        }
        public function logout(){
            if(Session::has('userId')){

            Session::pull('userId');

            return redirect(route('index'));
            }
            else if(Session::has('adminId')){

                Session::pull('adminId');

            return redirect(route('index'));
            }

        }
        public  function adminlogin(){

            $data=array();
        if(Session::has('adminId')){
            $data=User::where('id','=',Session::get('adminId'))->first();
        }
            $tenders=Tender::latest()->get();

            return view('admin.adminlayout',compact('data','tenders',));

        }
        public  function userlogin(){
            $data=array();
        if(Session::has('userId')){
            $data=User::where('id','=',Session::get('userId'))->first();
        }
            $tenders=Tender::latest()->get();
            return view('user.userlayout',compact('data','tenders'));

        }
}
