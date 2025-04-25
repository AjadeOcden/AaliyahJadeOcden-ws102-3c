<!-- resources/views/products/create.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Add New Student</h1>

        <form action="{{ route('students.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="fname">firstname</label>
                <input type="text" name="fname" id="fname" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="lname">lastname</label>
                <input type="text" name="lname" id="lname" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="email">email</label>
                <input type="text" name="email" id="email" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="program">Program</label>
                <select name="program" id="program" class="form-control" required>
                    <option value="" disabled selected>Select a program</option>
                    <option value="BSIT">BSIT</option>
                    <option value="BSCS">BSCS</option>
                    <option value="BSBA">BSBA</option>
                    <option value="BSED">BSED</option>
                </select>
            </div>

            <button type="submit" class="btn btn-success mt-3">Save Product</button>
        </form>
    </div>
@endsection
