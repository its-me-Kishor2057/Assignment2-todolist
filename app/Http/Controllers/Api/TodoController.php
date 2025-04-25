<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function index()
    {
        return response()->json(Todo::latest()->get());
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'description' => 'nullable|string',
        ]);

        $todo = Todo::create($validated);

        return response()->json(['message' => 'Todo created successfully.', 'data' => $todo], 201);
    }

    public function show(Todo $todo)
    {
        return response()->json($todo);
    }

    public function update(Request $request, Todo $todo)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'description' => 'nullable|string',
            'is_completed' => 'nullable|boolean',
        ]);

        $todo->update($validated);

        return response()->json(['message' => 'Todo updated successfully.', 'data' => $todo]);
    }

    public function destroy(Todo $todo)
    {
        $todo->delete();

        return response()->json(['message' => 'Todo deleted successfully.']);
    }
}
