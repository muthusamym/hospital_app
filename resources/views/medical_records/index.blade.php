<!-- resources/views/medical_records/index.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Medical Records</h2>
    <a href="{{ route('patients.create') }}" class="btn btn-primary">Back</a>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

    <table class="table mt-4">
        <thead>
            <tr>
                <th>Name</th>
                <th>Specialization</th>
                <th>Phone</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($appointments as $doctor)
                <tr>
                    <td>{{ $appointments->name }}</td>
                    <td>{{ $appointments->specialization }}</td>
                    <td>{{ $appointments->phone }}</td>
                    <td>
                        <a href="{{ route('appointments.show', $doctor) }}" class="btn btn-info">View</a>
                        <a href="{{ route('appointments.edit', $doctor) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('appointments.destroy', $doctor) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
