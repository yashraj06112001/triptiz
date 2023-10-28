<?php

namespace App\Http\Controllers;
use App\Models\information;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\second;
class takeinput extends Controller
{
  protected  function take(Request $request )
    {
       $name=$request->input('name');
        $email=$request->input('email');
        $i=new information;
        $i->name=$name;
        $i->email=$email;
        $result=$i->save();
        if ($result) {
            // Data saved successfully, return a success response
            return view('/second');
        } else {
            // Error saving data, return an error response
            return ["result"=>"failed"];
        }
        
       
    }
    public function secondData(Request $request)
    {
       $a=new second;
        $name=$request->name;
        $gender=$request->gender;
        $station=$request->selectedStation;
        $arrival= $request->arrival;
        $goingTo=$request->selectedStation2;
        $email=$request->email;
       $a->name= $name;
       $a->selectedStation=$station;
       $a->email=$email;
       $a->gender=$gender;
       $a->arrival=$arrival;
       $a->selectedStation2=$goingTo;
        $a->save();
    }
}
