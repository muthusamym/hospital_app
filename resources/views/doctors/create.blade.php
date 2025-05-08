{{-- resources/views/doctors/create.blade.php --}}

@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Add New Doctor</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('doctors.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name">Doctor Name</label>
            <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
        </div>

        <div class="mb-3">
            <label for="specialty">Specialty</label>
            <input type="text" name="specialty" class="form-control" value="{{ old('specialty') }}" required>
        </div>

        <div class="mb-3">
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
        </div>

        <div class="mb-3">
            <label for="phone">Phone</label>
            <input type="text" name="phone" class="form-control" value="{{ old('phone') }}">
        </div>

        <button type="submit" class="btn btn-primary">Add Doctor</button>
    </form>
</div>
@endsection
