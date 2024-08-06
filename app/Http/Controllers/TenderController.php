<?php

namespace App\Http\Controllers;
use App\Models\Tender;

use Illuminate\Http\Request;

class TenderController extends Controller
{
    public function post_tender(Request $request,$id){
        $validated=$request->validate(
            [
                'name'=>'required',
                'email'=>'required|email',
                'phone'=>'required|numeric',
                'address'=>'required',
                'type'=>'required',
                'discription'=>'required',
                'file'=>'required|file',
                'startdate'=>'required',
                'enddate'=>'required',

            ]
            );
            if($validated){
                $tender=new Tender;

                $tender->user_id=$id;
                $tender->name=$request->input('name');
                $tender->email=$request->input('email');
                $tender->phone=$request->input('phone');
                $tender->address=$request->input('address');
                $tender->type=$request->input('type');
                $tender->discription=$request->input('discription');
                $tender->startdate=$request->input('startdate');
                $tender->enddate=$request->input('enddate');


                $file = $request->file('file');
                $filename = time() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('Tenders'), $filename);

                $tender->file = 'Tenders/' . $filename;

                if ($tender->save()) {
                    return back()->withSuccess('Success');
                }
               else{
                return redirect(route('/'));
            }



            }

    }



}
