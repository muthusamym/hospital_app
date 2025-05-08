<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\MedicalRecord;


class MedicalRecordSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        MedicalRecord::create([
    'patient_id' => 1,
    'diagnosis' => 'Hypertension',
    'treatment' => 'Medication and lifestyle changes',
    'record_date' => now(),
]);

    }
}
