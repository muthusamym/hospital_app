<h2>Appointment Confirmed</h2>
<p>Dear {{ $appointment->patient->name }},</p>
<p>Your appointment with Dr. {{ $appointment->doctor->name }} has been scheduled on {{ \Carbon\Carbon::parse($appointment->appointment_time)->format('d M Y, h:i A') }}.</p>
<p>Thank you!</p>
