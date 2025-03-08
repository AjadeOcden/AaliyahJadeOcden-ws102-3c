<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudInsertController extends Controller
{
    public function insertForm()
{
    return view('stud_create');
}

public function insert(Request $request)
    {
    $name = $request->input('stud_name');
    DB::insert('insert into student(name) values(?)',[$name]);
    echo "Record inserted successfully <br>";
    echo "<a href='/insert'>click here</a>";
    }
}


