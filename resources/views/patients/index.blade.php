@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Patient List</h2>
    <a href="{{ route('patients.create') }}" class="btn btn-primary mb-2">Add Patient</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr><th>ID</th><th>Name</th><th>Email</th><th>Phone</th><th>Actions</th></tr>
        </thead>
        <tbody>
            @foreach ($patients as $patient)
                <tr>
                    <td>{{ $patient->id }}</td>
                    <td>{{ $patient->name }}</td>
                    <td>{{ $patient->email }}</td>
                    <td>{{ $patient->phone }}</td>
                    <td>
                        <a href="{{ route('patients.show', $patient) }}" class="btn btn-info btn-sm">View</a>
                        <a href="{{ route('patients.edit', $patient) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('patients.destroy', $patient) }}" method="POST" style="display:inline;">
                            @csrf @method('DELETE')
                            <button type="submit" onclick="return confirm('Delete this patient?')" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
