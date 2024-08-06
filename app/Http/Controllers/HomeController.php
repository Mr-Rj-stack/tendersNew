<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Models\User;
use App\Models\Tender;
class HomeController extends Controller
{
    public function index(){
        return view('frontend.home');
    }

    public function call(){
        $data=array();

        if(Session::has('userId')){
            $data=User::where('id','=',Session::get('userId'))->first();
        return view('second.tendercall',compact('data'));

        }
        else{
            return redirect(route('loginget'))->with("fail","You have to login first");
        }
    }
    public function bid(){
        if(Session::has('userId')){
            $tenders=Tender::latest()->get();
            $data=User::where('id','=',Session::get('userId'))->first();
        }
        return view('second.bidcall',compact('tenders','data'));
    }
    public function expert(){
        return view('second.expertoption');
    }
    public function makebid($id){
        if(Session::has('userId')){
        $data=User::where('id','=',Session::get('userId'))->first();
        $tenders=Tender::latest()->get();
        return view('second.bid_create',['tenderId' => $id]);
        }
    }
}
