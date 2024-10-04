<?php

namespace App\Http\Controllers;

use App\Models\ClassModel;
use App\Models\Trainer;
use Illuminate\Http\Request;

class ClassController extends Controller
{
    // Display a listing of the classes
    public function index()
    {
        $classes = ClassModel::with('trainer.user')->paginate(10); // Pagination of 10
        return view('classes.index', compact('classes'));
    }

    // Show the form for creating a new class
    public function create()
    {
        $trainers = Trainer::with('user')->get(); // Fetch all trainers
        return view('classes.create', compact('trainers'));
    }

    // Store a newly created class in the database
    public function store(Request $request)
    {
        $request->validate([
            'trainer_id' => 'required|exists:trainers,id',
            'class_time' => 'required|date',
            'capacity'   => 'required|integer|min:1',
        ]);

        ClassModel::create($request->all());

        return redirect()->route('classes.index')->with('success', 'Class created successfully.');
    }

    // Show the form for editing the specified class
    public function edit($id)
    {
        $class = ClassModel::findOrFail($id);
        $trainers = Trainer::with('user')->get(); // Fetch all trainers
        return view('classes.edit', compact('class', 'trainers'));
    }

    // Update the specified class in the database
    public function update(Request $request, $id)
    {
        $request->validate([
            'trainer_id' => 'required|exists:trainers,id',
            'class_time' => 'required|date',
            'capacity'   => 'required|integer|min:1',
        ]);

        $class = ClassModel::findOrFail($id);
        $class->update($request->all());

        return redirect()->route('classes.index')->with('success', 'Class updated successfully.');
    }

    // Delete the specified class via AJAX
    public function delete($id)
    {
        $class = ClassModel::findOrFail($id);
        $class->delete();

        return response()->json(['success' => true, 'message' => 'Class deleted successfully.']);
    }
}


