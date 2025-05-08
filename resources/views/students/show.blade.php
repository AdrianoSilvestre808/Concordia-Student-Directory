@extends('layout')

@section('content')
    <div class="mb-4">
        <h2>Student Profile</h2>
    </div>

    <div class="card shadow-sm bg-white">
        <div class="card-body">
            <h5 class="card-title">{{ $student->name }}</h5>
            <p class="card-text"><strong>Email:</strong> {{ $student->email }}</p>
            <p class="card-text"><strong>Address:</strong> {{ $student->address }}</p>
            <p class="card-text"><strong>Phone:</strong> {{ $student->phone }}</p>
            <p class="card-text"><strong>Date of Birth:</strong> {{ \Carbon\Carbon::parse($student->date_of_birth)->format('Y-m-d') }}</p>
            <p class="card-text"><strong>City:</strong> {{ $student->city->name }}</p>
        </div>
        <div class="card-footer d-flex justify-content-between">
            <a href="{{ route('students.index') }}" class="btn btn-secondary">Back to List</a>
            <div>
                <a href="{{ route('students.edit', $student->id) }}" class="btn btn-warning">Edit</a>
                <form action="{{ route('students.destroy', $student->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this student?')">Delete</button>
                </form>
            </div>
        </div>
    </div>
@endsection
