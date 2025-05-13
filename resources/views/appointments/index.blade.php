@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Appointments</h2>
    <a href="{{ route('appointments.create') }}" class="btn btn-primary mb-3">New Appointment</a>

    <table class="table table-bordered">
        <thead>
            <tr><th>ID</th><th>Patient</th><th>Doctor</th><th>Time</th><th>Status</th></tr>
        </thead>
        <tbody>
            @foreach ($appointments as $appointment)
                <tr>
                    <td>{{ $appointment->id }}</td>
                    <td>{{ $appointment->patient->name }}</td>
                    <td>{{ $appointment->doctor->name }}</td>
                    <td>{{ $appointment->appointment_time }}</td>
                    <td>{{ $appointment->status }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
