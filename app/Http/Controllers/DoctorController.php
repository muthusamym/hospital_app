<?php
// app/Http/Controllers/DoctorController.php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctor; // Assuming you have a Doctor model
use Illuminate\Support\Facades\Validator;

class DoctorController extends Controller
{
    // Show a list of all doctors
    public function index()
    {
        $doctors = Doctor::all();
        return view('doctors.index', compact('doctors')); // Replace with the appropriate view
    }

    // Show form to create a new doctor
    public function create()
    {
        return view('doctors.create'); // Replace with the appropriate view
    }

    // Store a newly created doctor
    public function store(Request $request)
    {
        // Validate the input
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'specialty' => 'required|string|max:255',
            'email' => 'required|email|unique:doctors,email',
            'phone' => 'required|string|max:15',
        ]);

        // Create new doctor
        $doctor = Doctor::create($validated);

        return redirect()->route('doctors.index')->with('success', 'Doctor created successfully!');
    }

    // Show a specific doctor
    public function show($id)
    {
        $doctor = Doctor::findOrFail($id);
        return view('doctors.show', compact('doctor')); // Replace with the appropriate view
    }

    // Show form to edit a specific doctor
    public function edit($id)
    {
        $doctor = Doctor::findOrFail($id);
        return view('doctors.edit', compact('doctor')); // Replace with the appropriate view
    }

    // Update a specific doctor
    public function update(Request $request, $id)
    {
        $doctor = Doctor::findOrFail($id);

        // Validate the input
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'specialty' => 'required|string|max:255',
            'email' => 'required|email|unique:doctors,email,' . $doctor->id,
            'phone' => 'required|string|max:15',
        ]);

        $doctor->update($validated);

        return redirect()->route('doctors.index')->with('success', 'Doctor updated successfully!');
    }

    // Delete a specific doctor
    public function destroy($id)
    {
        $doctor = Doctor::findOrFail($id);
        $doctor->delete();

        return redirect()->route('doctors.index')->with('success', 'Doctor deleted successfully!');
    }
}

