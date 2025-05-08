<!-- resources/views/doctors/index.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Doctors</h2>
    <a href="{{ route('doctors.create') }}" class="btn btn-primary">Add New Doctor</a>
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
           
                <tr>
                    <td>{{ $doctor->name }}</td>
                    <td>{{ $doctor->specialization }}</td>
                    <td>{{ $doctor->phone }}</td>
                    <td>
                        <a href="{{ route('doctors.show', $doctor) }}" class="btn btn-info">View</a>
                        <a href="{{ route('doctors.edit', $doctor) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('doctors.destroy', $doctor) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
          
        </tbody>
    </table>
</div>
@endsection
