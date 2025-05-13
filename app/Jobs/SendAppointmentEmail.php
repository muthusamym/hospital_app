<?php

namespace App\Jobs;

use App\Mail\AppointmentScheduled;
use Illuminate\Bus\Queueable;
use App\Models\Appointment;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Log;

class SendAppointmentEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $appointment;

    public function __construct(Appointment $appointment)
    {
        $this->appointment = $appointment;
    }

    public function handle(): void
    {
		Log::info('Processing appointment for ID: ' . $this->appointment->id);
        Mail::to($this->appointment->patient->email)
            ->send(new AppointmentScheduled($this->appointment));
			
    }
	public function failed(Exception $exception)
{
    Log::error('Job failed: ' . $exception->getMessage());
}
}

