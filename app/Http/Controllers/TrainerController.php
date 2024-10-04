<?php

namespace App\Http\Controllers;

use App\Models\Trainer;
use App\Models\User;
use Illuminate\Http\Request;

class TrainerController extends Controller
{
    // List all trainers
    public function index()
    {
        // Fetch trainers with pagination, e.g., 10 per page
        $trainers = Trainer::with('user')->paginate(10);

        return view('trainers.index', compact('trainers'));
    }

    // Show the form for creating a new trainer
    public function create()
{
    // Fetch users to populate the dropdown
    $users = User::all(); // You can add filtering logic if necessary
    return view('trainers.create', compact('users'));
}

    // Store a newly created trainer in the database
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'expertise' => 'required|string|max:255',
            'availability' => 'nullable|string',
        ]);

        Trainer::create($request->all());

        return redirect()->route('trainers.index')->with('success', 'Trainer created successfully.');
    }

    // Show the form for editing the specified trainer
    public function edit($id)
{
    $trainer = Trainer::findOrFail($id);
    $users = User::all(); // You can add any filtering logic if necessary

    return view('trainers.edit', compact('trainer', 'users'));
}

    // Update the specified trainer in the database
    public function update(Request $request, $id)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'expertise' => 'required|string|max:255',
            'availability' => 'nullable|string',
        ]);

        $trainer = Trainer::findOrFail($id);
        $trainer->update($request->all());

        return redirect()->route('trainers.index')->with('success', 'Trainer updated successfully.');
    }

    public function delete($id)
    {
        $trainer = Trainer::findOrFail($id);
        $trainer->delete();

        return response()->json(['success' => true, 'message' => 'Trainer deleted successfully.']);
    }
}
