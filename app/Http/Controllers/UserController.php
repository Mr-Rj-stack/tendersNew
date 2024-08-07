<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Tender;
use App\Models\User;
use App\Models\Bidd;
use Session;
use Hash;

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
    public function user_profile(){
        $data=User::where('id','=',Session::get('userId'))->first();

        return view('user.user_profile',compact('data'));
    }
    public function update_details(Request $request,$id){
        $request->validate([
                'name'=>'required',
                'address'=>'required',
                'phone'=>'required',
        ]);

        $user=User::find($id);
        if($user){
        $user->name=$request->input('name');
        $user->address=$request->input('address');
        $user->phone=$request->input('phone');

        $user->save();
        return back()->with('success','Details updated succesfully');
        }
        else{
        return back()->with('fail','failed to update');

        }
    }
    public function update_password(Request $request,$id){
        $request->validate([
            'current_password'=>'required',
            'password'=>'required|confirmed|min:5|max:15',
            'password_confirmation'=>'required'
        ]);

        $currentPassword=$request->input('current_password');
        $newPassword=$request->input('password');
        if(Auth::attempt(['id'=>$id,'password'=>$currentPassword])){
            $user=User::find($id);
            $user->password=hash::make($newPassword);
            $user->save();

            return back()->withSuccess("Password Updated Successfully");
        }
        else{
        return back()->with('fail','failed to update password');

        }
    }
    public function delete_account(Request $request, $id){

    $request->validate([
        'password' => 'required|min:5|max:15',
    ]);

    $password = $request->input('password');
    $user = User::find($id);

    if (!$user) {
        return back()->with('fail', 'User not found');
    }

    if (Hash::check($password, $user->password)) {
        $user->delete();
        Auth::logout();

        return redirect('/')->with('success', 'Account deleted successfully');
    } else {
        return back()->with('fail', 'Password is incorrect');
    }
}


}
