<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CalculateController extends Controller
{
    public function calculate($op, $num1, $num2)
    //ito naman is naglagay ako ng parameters na magrerecieve ng data galing sa url na pinasa using route
    {
        return view("welcome", compact('op', 'num1', 'num2'));
        //nag use ako ng compact kasi i will transfer multiple variables
    }
}
