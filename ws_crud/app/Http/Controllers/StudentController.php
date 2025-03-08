<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\DB;


class StudentController extends Controller
{
    public function insertForm()
{
    return view('stud_create');
}

public function insert(Request $request)
    {
    $name = $request->input('stud_name');
    DB::insert('insert into student(name) values(?)',[$name]);
    // echo "Record inserted successfully <br>";
    // echo "<a href='/insert'>click here</a>";
    return redirect('view');
    }


//to output all
public function index(){
$users = DB::select('select * from student');
return view('stud_view',['users'=>$users]);    
}

//to delete
public function delete($id){
    DB::delete('delete from student where id = ?',[$id]);
    //echo "Record deleted successfully <br>";
    return redirect('view');
}

public function show($id) {
    $users = DB::select('select * from student where id = ?',[$id]);
    return view('editRecord',['users'=>$users]);
 }


public function edit($id, Request $request){
    $name = $request->input('stud_name');
    DB::update('update student set name =? where id = ?', [$name, $id]);
    echo "record updated successfully. <br>";
    echo "<a href='/view'> click here to go back</a>";
}
}
