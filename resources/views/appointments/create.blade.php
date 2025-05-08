@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Schedule Appointment</h2>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
        </ul>
    </div>
@endif
    <form method="POST" action="{{ route('appointments.store') }}">
        @csrf
        <div class="mb-3">
            <label>Patient</label>
            <select name="patient_id" class="form-control">
                @foreach($patients as $patient)
                    <option value="{{ $patient->id }}">{{ $patient->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label>Doctor</label>
            <select name="doctor_id" class="form-control">
                @foreach($doctors as $doctor)
                    <option value="{{ $doctor->id }}">{{ $doctor->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label>Appointment Time</label>
            <input type="datetime-local" name="appointment_time" class="form-control">
        </div>
        <button class="btn btn-success">Schedule</button>
    </form>
</div>
@endsection
