<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Appointment;

class AppointmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Appointment::create([
    'doctor_id' => 1,
    'patient_id' => 1,
    'appointment_date' => now()->addDays(2),
    'status' => 'scheduled',
]);

    }
}
