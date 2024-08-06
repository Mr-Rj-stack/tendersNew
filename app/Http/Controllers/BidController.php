<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bidd;
use Illuminate\Support\Facades\Auth;


class BidController extends Controller
{
    public function post_bid(Request $request,$id){

        $validated=$request->validate(
            [
                'name'=>'required',
                'companyname'=>'required',
                'email'=>'required|email',
                'phone'=>'required|numeric',
                'address'=>'required',
                'bid_amount'=>'required',
                'quotation'=>'required|file',


            ]
            );
            if($validated){
                $bid=new Bidd;
                $bid->user_id = Auth::id();
                $bid->tender_id=$id;
                $bid->name=$request->input('name');
                $bid->companyname=$request->input('companyname');
                $bid->email=$request->input('email');
                $bid->phone=$request->input('phone');
                $bid->address=$request->input('address');
                $bid->bid_amount=$request->input('bid_amount');



                if ($request->hasFile('quotation')) {
                    $file = $request->file('quotation');
                    $filename = time() . '.' . $file->getClientOriginalExtension();
                    $file->move(public_path('Bidds'), $filename);
                    $bid->quotation = 'Bidds/' . $filename;
                }

                // Save the bid
                if ($bid->save()) {
                    return back()->withSuccess('Bid submitted successfully!');
                }

                return back()->withErrors('Failed to submit the bid.');
            }






    }




}
