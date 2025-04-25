@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $student->fname }} {{ $student->lname }}</h1>

        <p><strong>Email:</strong> {{ $student->email }}</p>
        <p><strong>Program:</strong> {{ $student->program }}</p>

        <div class="mt-4">
            <h4>QR Code</h4>
            <div>{!! $qr !!}</div> <!-- Display the QR code here -->
        </div>

        <a href="{{ route('students.index') }}" class="btn btn-secondary mt-3">Back to List</a>
    </div>
@endsection
