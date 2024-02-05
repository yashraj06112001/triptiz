<?php

namespace App\Http\Controllers;
use App\Models\second;
use App\Models\finalSeating;
use Illuminate\Http\Request;

class solution extends Controller
{
    public function sol(Request $req)
    {
       
        $s=new second;
        $femaleSeat=[1,3,5,7,9,11,13,15,17,19];
        $maleSeat=[2,4,6,8,10,12,14,16,18,20];
        $items_of_second=$s->all();  //all elements are taken at one place in $item


        foreach($items_of_second as $item)  // the loop of work has started and this will give me my solution
        {    $final=new finalSeating;
            $gen=$item->gender;
            $name=$item->name;
            $email=$item->email;
           if($gen==='male')
           {
            if(count($maleSeat)!=0)
            {
                $alloted=$maleSeat[0];
                unset($maleSeat[0]);
                $maleSeat = array_values($maleSeat);
                $final->name=$name;
                $final->seat=$alloted;
                $final->gender=$gen;
                $final->email=$email;
                $final->save();
            }
            else if(count($femaleSeat)!=0){
                continue;
            }
            else{
                break;
            }
           }
           else{
            if(count($femaleSeat)!=0)
            {
                $alloted=$femaleSeat[0];
                unset($femaleSeat[0]);
                $femaleSeat = array_values($femaleSeat);
                $final->name=$name;
                $final->seat=$alloted;
                $final->gender=$gen;
                $final->email=$email;
                $final->save();
            }
            else if(count($maleSeat)!=0){
                continue;
            }
            else{
                break;
            }
           }
        }
   
            
     }
 }
    //

