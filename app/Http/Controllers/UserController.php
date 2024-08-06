<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tender;
use App\Models\User;
use App\Models\Bidd;
use Session;

class UserController extends Controller
{
    public function user_tenders(){
        if(Session::has('userId')){
            $tenders=Tender::where('user_id','=',Session::get('userId'))->get();
            $data=User::where('id','=',Session::get('userId'))->first();
        }
        return view('user.user_tenders',compact('tenders','data'));
    }
    public function user_bids($id){
        if(Session::has('userId')){
            $bids=Bidd::where('tender_id','=',$id)->get();
            $data=User::where('id','=',Session::get('userId'))->first();
        }
        return view('user.user_bids',compact('data','bids'));
    }
    public function view_bids(){
        if(Session::has('userId')){
            $data=User::where('id','=',Session::get('userId'))->first();

            // $tenders=Tender::where('userId','=',Bidd::get('user_id'))->get();
            $bids=Bidd::where('user_id','=',Session::get('userId'))->get();
        }
        return view('user.mybids',compact('data','bids'));
    }
}
