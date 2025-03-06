<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ResumeController extends Controller
{
    public function showForm(){
        return view("registration");
    }
    public function handleForm(Request $request){
        $validate = $request->validate(
            [
                'fname' => 'required|string|max:50',
                'lname' => 'required|string|max:50',
                'sex' => 'required|in:male,female',
                'mobileNo' => ['required', 'regex:/^09(98|99|20)-\d{3}-\d{3}$/'],
                'telNo' => 'required|numeric',
                'bday' => 'required|date|before:today',
                'addr' => 'required|max:100',
                'email' => 'required|email',
                'website' => 'required|url'
            ]
            );
        return back()->with("success","Successfully Submitted :)");
    }
}
