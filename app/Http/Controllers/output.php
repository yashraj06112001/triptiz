<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\second;
use App\Models\seat;
class output extends Controller
{
    //
    function seatDecide()
    {
        $totalSeats=20;
        $arrM1=array(1,5,9,13,17);
        $arrM2=array(3,7,11,15,19);
        $arrF=array(2,4,6,8,10,12,14,16,18,20);
        $value=second::all();
        foreach($value as $i)// each value of the record is now used to make the booking
        {
            $gender=$value->gender;
            if($gender==='male')
            {
                if(count($arrM1)!=0)
                {
                    $seatNumber=$arrM1[0];
                    

                }
            }
            if($gender==="female")
            {
                if(count($arrF)!=0)
                {

                }
                else{

                }
            }
        }
        {

        }

    }
}
