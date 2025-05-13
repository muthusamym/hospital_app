<?php

// app/Http/Controllers/AppointmentController.php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\Patient;
use Illuminate\Http\Request;
use App\Http\Requests\StoreAppointmentRequest;
use Illuminate\Support\Facades\Log;

use App\Mail\AppointmentScheduled;
use Illuminate\Support\Facades\Mail;
use App\Jobs\SendAppointmentEmail;


class AppointmentController extends Controller
{
		public function index()
	{
		$appointments = Appointment::with(['patient', 'doctor'])->get();
		return view('appointments.index', compact('appointments'));
	}

    public function create()
    {
        $doctors = Doctor::all();
        $patients = Patient::all();
        return view('appointments.create', compact('doctors', 'patients'));
    }

   public function store(StoreAppointmentRequest $request)
{
	
    try {
		
		
        $appointment = Appointment::create($request->validated());
		
		// without queue 
		 Mail::to($appointment->patient->email)->send(new AppointmentScheduled($appointment)); 
		// with job queue
		// SendAppointmentEmail::dispatch($appointment);
		 
		//\Log::info('Validated Data:', $appointment);

    return redirect()->route('appointments.index')->with('success', 'Appointment scheduled and email sent.');
	
		//$appointment->patient->notify(new AppointmentScheduled($appointment));
		//\Log::info('Validated Data:', $appointment);

        // Notify patient or doctor
       // return redirect()->route('appointments.index')->with('success', 'Appointment created!');
		
		
    } catch (\Exception $e) {
        Log::error('Error creating appointment: '.$e->getMessage());
        return back()->with('error', 'Failed to create appointment. Please try again.');
    }
}
}

