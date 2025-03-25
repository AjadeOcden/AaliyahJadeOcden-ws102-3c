<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class UserManagementController extends Controller
{
    public function userRegistrationForm(){
        return view('userRegistrationForm');
    }
    public function registrationForm(){
        return view('registrationForm');
    }

    public function insertRegistration(Request $request){
        // Validate input
        $request->validate([
            'fname' => 'required|string|max:255',
            'lname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

       $fname = $request->input('fname');
       $lname = $request->input('lname');
       $email = $request->input('email');
       $password = Hash::make($request->input('password'));
       $roleId = $request->input('roleId');

       DB::insert('INSERT INTO users (fname, lname, email, password, roleId) Values(?,?,?,?,?)', [$fname,$lname,$email,$password, $roleId]);
       
        echo "<div style='
       max-width: 500px;
       margin: 50px auto;
       padding: 20px;
       text-align: center;
       background: #f8f9fa;
       border-radius: 8px;
       box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);'>
       <h2 style='color: #28a745; font-family: Arial, sans-serif;'>Success!</h2>
       <p style='font-size: 16px; color: #333;'> added successfully.</p>
       <a href='/login' 
          style='text-decoration: none; 
                 background-color: #007bff; 
                 color: white; 
                 padding: 12px 20px; 
                 border-radius: 5px; 
                 display: inline-block; 
                 margin-top: 10px; 
                 font-weight: bold; 
                 transition: background 0.3s;'>
          Login
       </a>
   </div>";
       
       
       //return redirect("welcome");
    }

    public function adminInsertRegistration(Request $request){
        // Validate input
        $request->validate([
            'fname' => 'required|string|max:255',
            'lname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

       $fname = $request->input('fname');
       $lname = $request->input('lname');
       $email = $request->input('email');
       $password = Hash::make($request->input('password'));
       $roleId = $request->input('roleId');

       DB::insert('INSERT INTO users (fname, lname, email, password, roleId) Values(?,?,?,?,?)', [$fname,$lname,$email,$password, $roleId]);
       
        echo "<div style='
       max-width: 500px;
       margin: 50px auto;
       padding: 20px;
       text-align: center;
       background: #f8f9fa;
       border-radius: 8px;
       box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);'>
       <h2 style='color: #28a745; font-family: Arial, sans-serif;'>Success!</h2>
       <p style='font-size: 16px; color: #333;'>The record has been added successfully.</p>
       <a href='/viewList' 
          style='text-decoration: none; 
                 background-color: #007bff; 
                 color: white; 
                 padding: 12px 20px; 
                 border-radius: 5px; 
                 display: inline-block; 
                 margin-top: 10px; 
                 font-weight: bold; 
                 transition: background 0.3s;'>
          Return to User List
       </a>
   </div>";
      
       //return redirect("welcome");
    }

    public function readUsers(){
        $users = DB::select("
        SELECT users.id, users.fname, users.lname, users.email, users.password, roles.role 
        FROM users
        JOIN roles ON users.roleId = roles.roleId
         ");

        
        return view('viewList', ['users'=> $users]);
    }

    public function show($id){
        $user = DB::select("SELECT * FROM users WHERE id=?", [$id]);
        
        return view('editUser', ['user'=> $user]);
    }
    public function showDetails($id){

         $user = DB::select("
         SELECT users.id, users.fname, users.lname, users.email, users.password, roles.role 
         FROM users
         JOIN roles ON users.roleId = roles.roleId
         WHERE users.id = ?
     ", [$id]);

        
        return view('showDetails', ['user'=> $user]);
    }

    public function edit($id, Request $request){

        $request->validate([
            'fname' => 'required|string|max:255',
            'lname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:6|confirmed',
        ]);
        $fname = $request->input('fname');
       $lname = $request->input('lname');
       $email = $request->input('email');
       $password = Hash::make($request->input('password'));
       $roleId = $request->input('roleId');

       DB::update("UPDATE users set fname=?, lname=?, roleId=?, email=?, password=? WHERE id = ?", [$fname, $lname, $roleId, $email, $password, $id]);
       echo "<div style='
        max-width: 500px;
        margin: 50px auto;
        padding: 20px;
        text-align: center;
        background: #f8f9fa;
        border-radius: 8px;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);'>
        <h2 style='color: #28a745; font-family: Arial, sans-serif;'>Success!</h2>
        <p style='font-size: 16px; color: #333;'>The record has been updated successfully.</p>
        <a href='/viewList' 
           style='text-decoration: none; 
                  background-color: #007bff; 
                  color: white; 
                  padding: 12px 20px; 
                  border-radius: 5px; 
                  display: inline-block; 
                  margin-top: 10px; 
                  font-weight: bold; 
                  transition: background 0.3s;'>
           Return to User List
        </a>
    </div>";



    }

    public function delete($id){
        DB::delete("DELETE FROM users WHERE id=?", [$id]);

        echo "<div style='
        max-width: 500px;
        margin: 50px auto;
        padding: 20px;
        text-align: center;
        background: #f8f9fa;
        border-radius: 8px;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);'>
        <h2 style='color: #28a745; font-family: Arial, sans-serif;'>Success!</h2>
        <p style='font-size: 16px; color: #333;'>The record has been deleted successfully.</p>
        <a href='/viewList' 
           style='text-decoration: none; 
                  background-color: #007bff; 
                  color: white; 
                  padding: 12px 20px; 
                  border-radius: 5px; 
                  display: inline-block; 
                  margin-top: 10px; 
                  font-weight: bold; 
                  transition: background 0.3s;'>
           Return to User List
        </a>
    </div>";

       
    }

    public function search(Request $request) {
        $skey = $request->query("skey");
        $sort = $request->query("sort");
        $key = $request->query("key");
    
        // if (!$key || !$skey || !$sort) {//check if may key or wala
        //     return redirect('/viewList'); // Redirect if no search key is provided
        // }
        
    
        $searchkey = "%{$skey}%";
    
        $users = DB::select("
        SELECT users.id, users.fname, users.lname, users.email, roles.role 
        FROM users
        JOIN roles ON users.roleId = roles.roleId 
        WHERE users.fname LIKE ? OR users.lname LIKE ?
        ORDER BY {$key} {$sort}", [$searchkey, $searchkey]);
    
        return view('viewList', ['users' => $users]);
    }

    public function loginForm(){
        return view("adminLogin");
    }
    
    public function login(Request $request){
        $request->validate([
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:6',
        ]);
    
        $email = $request->input("email");
        $password = $request->input("password");
    
        $user = DB::select("SELECT users.password, users.id, roles.roleId FROM users JOIN roles ON users.roleId = roles.roleId WHERE users.email = ?", [$email]);
    
        if ($user) {
            if (Hash::check($password, $user[0]->password)) {
                if($user[0]->roleId == "1"){
                    return redirect("viewList"); // Change to the actual route
                }
                else{
                    // session(["user" => $user[0]]);
                    return redirect()->route("userDetails", ["id" => $user[0]->id]);

                }
                
            } else {
                return back()->with("error", "Invalid password.");
            }
        } else {
            return back()->with("error", "User not found.");
        }
    }

    public function userDetails($id) {
        $user = DB::select("SELECT * FROM users WHERE id = ?", [$id]);
    
        if (empty($user)) {
            return back()->with("error", "User not found.");
        }
    
        return view("userDetails", ["user" => $user[0]]);
    }

    //USER EDIT
    public function userEditForm($id){
        $user = DB::select("SELECT * FROM users WHERE id=?", [$id]);
        
        return view('userEdit', ['user'=> $user]);
    }
    public function userEdit($id, Request $request){
        $request->validate([
            'fname' => 'required|string|max:255',
            'lname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:6|confirmed',
        ]);
        $fname = $request->input('fname');
       $lname = $request->input('lname');
       $email = $request->input('email');
       $password = Hash::make($request->input('password'));
       $roleId = $request->input('roleId');

       DB::update("UPDATE users set fname=?, lname=?, roleId=?, email=?, password=? WHERE id = ?", [$fname, $lname, $roleId, $email, $password, $id]);
       echo "<div style='
        max-width: 500px;
        margin: 50px auto;
        padding: 20px;
        text-align: center;
        background: #f8f9fa;
        border-radius: 8px;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);'>
        <h2 style='color: #28a745; font-family: Arial, sans-serif;'>Success!</h2>
        <p style='font-size: 16px; color: #333;'>The record has been updated successfully.</p>
        <a href='/userDetails/$id' 
           style='text-decoration: none; 
                  background-color: #007bff; 
                  color: white; 
                  padding: 12px 20px; 
                  border-radius: 5px; 
                  display: inline-block; 
                  margin-top: 10px; 
                  font-weight: bold; 
                  transition: background 0.3s;'>
           Return
        </a>
    </div>";
    }
    public function logout(){
        return view("adminLogin");
    }
    
}
