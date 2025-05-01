<?php

namespace App\Http\Controllers;

use App\Models\Employees;
use App\Models\Subject;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class EmployeesController extends Controller
{
    
    
    //REGISTRATION 
    public function registrationForm()
    {
        return view("employee.registrationForm");
    }

    public function register(Request $request){
        $request->validate([
            'emp_name'=> 'required|string',
            'emp_email'=> 'required|string',
            'emp_password' => 'required|min:6',
        ]);

        Employees::create([
            "emp_name" => $request->emp_name,
            "emp_email" => $request->emp_email,
            "emp_password" => Hash::make($request->emp_password),
        ]);

        return redirect()->route("login");
    }

    //LOGIN
    public function loginForm()
    {
        return view("employee.loginForm");
    }

    public function login(Request $request)
    {
        $request->validate([
            'emp_email'=> 'required|string',
            'emp_password' => 'required|min:6',
        ]);
        $employee = Employees::where("emp_email", $request->emp_email)->first();

        if($employee && Hash::check($request->emp_password, $employee->emp_password)){

            session(['emp_id' => $employee->id]);
            return redirect()->route('index');
        }

        return back()->withErrors([
            'emp_email' => 'Invalid email or password.',
        ]);
    }

    public function index(){

        $empId = session('emp_id');

        if (!$empId) {
            return redirect()->route('login');
        }

        $subjects = Subject::all();

    
        return view('employee.index', compact('subjects'));
    }

    public function logout(){
        session()->forget('emp_id'); 
        return redirect()->route("loginForm");
    }


}
