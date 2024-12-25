<?php

namespace App\Http\Controllers\API;

use App\Models\Task;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class TaskController extends Controller
{
    // Display a listing of the tasks for the authenticated user
    public function index(Request $request)
    {
        $tasks = Task::where('user_id', auth()->id())
            ->when($request->has('status') && in_array($request->status, ['Pending', 'In Progress', 'Completed']), function ($query) use ($request) {
                $query->where('status', $request->status);
            })
            ->when($request->has('sort_by') && $request->sort_by === 'due_date', function ($query) {
                $query->orderBy('due_date', 'asc');
            })
            ->get();

        if ($tasks->isEmpty()) {
            return response()->json([
                'message' => 'No tasks. Please add some taks',
            ]);
        }
        
        return response()->json($tasks);
    }

    // Store a newly created task
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title'         => 'required|string|max:255',
            'description'   => 'nullable|string',
            'status'        => 'required',
            'due_date'      => 'nullable|date',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 422);
        }

        try {
            $task = new Task();
            $task->title = $request->title;
            $task->status = $request->status;
            $task->description = $request->description;
            $task->due_date = $request->due_date;
            $task->user_id = Auth::user()->id;
            $task->save();
            return response()->json(['message' => 'Task created successfully.'], 201);
        } catch (\Throwable $th) { 
            return response()->json(['error' => 'There was an error creating the task.'], 500);
        }
    }

    // Show the specified task
    public function view($id)
    {
        $task = Task::find($id);
        if (!$task || $task->user_id !== auth()->id()) {
            return response()->json(['error' => 'Task not found or unauthorized.'], 404);
        }
        return response()->json($task);
    }

    // Update the specified task
    public function update(Request $request, $id)
    {
        $task = Task::find($id);

        if (!$task || $task->user_id !== auth()->id()) {
            return response()->json(['error' => 'Task not found or unauthorized.'], 404);
        }

        $validator = Validator::make($request->all(), [
            'title'         => 'required|string|max:255',
            'description'   => 'nullable|string',
            'status'        => 'required',
            'due_date'      => 'nullable|date',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 422);
        }

        try {
            $task->title = $request->title;
            $task->status = $request->status;
            $task->description = $request->description;
            $task->due_date = $request->due_date;
            $task->update();
            return response()->json(['message' => 'Task updated successfully.'], 200);
        } catch (\Throwable $th) {
            return response()->json(['error' => 'There was an error updating the task.'], 500);
        }
    }

    // Remove the specified task
    public function destroy($id)
    {
        $task = Task::find($id);

        if (!$task || $task->user_id !== auth()->id()) {
            return response()->json(['error' => 'Task not found or unauthorized.'], 404);
        }

        try {
            $task->delete();
            return response()->json(['message' => 'Task deleted successfully.'], 200);
        } catch (\Throwable $th) {
            return response()->json(['error' => 'There was an error deleting the task.'], 500);
        }
    }
}
