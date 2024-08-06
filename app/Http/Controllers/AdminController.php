<?php

namespace App\Http\Controllers;
use App\Models\Tender;
use App\Models\User;
use Session;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function all_tenders(){
        $tenders=Tender::latest()->get();

        if(Session::has('adminId')){
         $data=User::where('id','=',Session::get('adminId'))->first();
        return view('admin.all_tenders',compact('tenders','data'));
        }
    }
    public function bid_details(){

        return view('admin.bid_details');
    }
    public function user_details(){
        $users=User::latest()->get();
        $data=User::where('id','=',Session::get('adminId'))->first();

        return view('admin.user_details',compact('users','data'));
    }

    public function admin_profile(){
        $data=User::where('id','=',Session::get('adminId'))->first();

        return view('admin.admin_profile',compact('data'));
    }
}


