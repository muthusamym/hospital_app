@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Patient</h2>

    <form action="{{ route('patients.update', $patient) }}" method="POST">
        @csrf @method('PUT')
        <div class="mb-3">
            <label>Name</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', $patient->name) }}">
        </div>
        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" value="{{ old('email', $patient->email) }}">
        </div>
        <div class="mb-3">
            <label>Phone</label>
            <input type="text" name="phone" class="form-control" value="{{ old('phone', $patient->phone) }}">
        </div>
        <button class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
