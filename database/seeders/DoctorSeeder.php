<?php
// database/seeders/DoctorSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Doctor;

class DoctorSeeder extends Seeder
{
    public function run()
    {
        Doctor::create([
            'name' => 'Dr. John Doe',
            'specialty' => 'Cardiology',
            'email' => 'john@example.com',
            'phone' => '1234567890',
        ]);

        Doctor::create([
            'name' => 'Dr. Jane Smith',
            'specialty' => 'Dermatology',
            'email' => 'jane@example.com',
            'phone' => '9876543210',
        ]);
    }
}

