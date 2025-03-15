<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    // Get all tasks
    public function index()
    {
        $tasks = Task::all();
        return response()->json([
            'data' => $tasks
        ], 200);
    }

    // Get a single task
    public function show($id)
    {
        $task = Task::find($id);
        return $task ? response()->json([
            'data' => $task
        ], 200) : response()->json(['message' => 'Task not found'], 404);
    }

    // Create a new task
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);
        $task = Task::create($request->only('title', 'description'));
        return response()->json(['message' => 'Task created'], 201);
    }

    // Update an existing task
    public function update(Request $request, $id)
    {
        // dd($request->all());
        $request->validate([
            'title' => 'sometimes|string|max:255',
            'description' => 'nullable|string',
            'completed' => 'boolean'
        ]);

        $task = Task::find($id);
        if (!$task) {
            return response()->json(['message' => 'Task not found'], 404);
        }

        $task->update($request->only('title', 'description', 'completed'));

        return response()->json(['message' => 'Task updated'], 200);
    }

    // Delete a task
    public function destroy($id)
    {
        $task = Task::find($id);
        if (!$task) {
            return response()->json(['message' => 'Task not found'], 404);
        }
        $task->delete();
        return response()->json(['message' => 'Task deleted'], 200);
    }
}

