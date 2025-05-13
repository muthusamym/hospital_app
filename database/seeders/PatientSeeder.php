<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Patient;

class PatientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       // database/seeders/PatientSeeder.php

		Patient::create([
			'name' => 'Alice Johnson',
			'email' => 'alice@example.com',
			'phone' => '5551234567',
			'dob' => '1990-05-10',
			'address' => '123 Main St, Springfield',
		]);

    }
}
