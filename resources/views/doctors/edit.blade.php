{{-- resources/views/doctors/edit.blade.php --}}

@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Doctor</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('doctors.update', $doctor->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name">Doctor Name</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', $doctor->name) }}" required>
        </div>

        <div class="mb-3">
            <label for="specialty">Specialty</label>
            <input type="text" name="specialty" class="form-control" value="{{ old('specialty', $doctor->specialty) }}" required>
        </div>

        <div class="mb-3">
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control" value="{{ old('email', $doctor->email) }}" required>
        </div>

        <div class="mb-3">
            <label for="phone">Phone</label>
            <input type="text" name="phone" class="form-control" value="{{ old('phone', $doctor->phone) }}">
        </div>

        <button type="submit" class="btn btn-success">Update Doctor</button>
    </form>
</div>
@endsection
