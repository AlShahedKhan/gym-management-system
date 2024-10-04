<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\ClassModel; // Assuming your Class model is named ClassModel
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    // List all bookings
    public function index()
    {
        $bookings = Booking::with('trainee', 'class')->paginate(10); // Adjust pagination as needed
        return view('bookings.index', compact('bookings'));
    }
    
    public function create()
    {
        // Get the role 'trainee' from the roles table
        $traineeRole = Role::where('name', 'trainee')->first();

        // Get all users that have the 'trainee' role
        $trainees = User::where('role_id', $traineeRole->id)->get();

        // Get all classes
        $classes = ClassModel::all();

        // Pass the trainees and classes to the view
        return view('bookings.create', compact('trainees', 'classes'));
    }

    // Store a newly created booking in the database
    public function store(Request $request)
    {
        $request->validate([
            'trainee_id' => 'required|exists:users,id',
            'class_id' => 'required|exists:classes,id',
            'booking_time' => 'required|date',
        ]);

        Booking::create($request->all());

        return redirect()->route('bookings.index')->with('success', 'Booking created successfully.');
    }

    // Show the form for editing the specified booking
    public function edit($id)
    {
        $booking = Booking::findOrFail($id);

        // Get the role 'trainee' from the roles table
        $traineeRole = Role::where('name', 'trainee')->first();

        // Get all users that have the 'trainee' role
        $trainees = User::where('role_id', $traineeRole->id)->get();

        // Get all classes
        $classes = ClassModel::all();

        // Pass the booking, trainees, and classes to the view
        return view('bookings.edit', compact('booking', 'trainees', 'classes'));
    }

    // Update the specified booking in the database
    public function update(Request $request, $id)
    {
        $request->validate([
            'trainee_id' => 'required|exists:users,id',
            'class_id' => 'required|exists:classes,id',
            'booking_time' => 'required|date',
        ]);

        $booking = Booking::findOrFail($id);
        $booking->update($request->all());

        return redirect()->route('bookings.index')->with('success', 'Booking updated successfully.');
    }

    // Delete the specified booking from the database
    public function delete($id)
{
    $booking = Booking::findOrFail($id);

    try {
        $booking->delete(); // Delete the booking
        return response()->json(['success' => true, 'message' => 'Booking deleted successfully.']);
    } catch (\Exception $e) {
        return response()->json(['success' => false, 'message' => 'Failed to delete the booking.']);
    }
}

}
