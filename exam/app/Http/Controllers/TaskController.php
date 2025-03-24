<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    // Ensure only authenticated users can access tasks
    public function __construct()
    {
        $this->middleware('auth');
    }

    // Show tasks
    public function index()
    {
        $tasks = Task::where('user_id', Auth::id())->get();
        return view('tasks.index', compact('tasks'));
    }

    // Store a new task
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Task::create([
            'name' => $request->name,
            'status' => 0,
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('tasks.index');
    }

    // Mark task as completed
    public function update($id)
    {
        $task = Task::findOrFail($id);
        
        // Ensure only the owner can update
        if ($task->user_id !== Auth::id()) {
            abort(403);
        }

        $task->update(['status' => 1]);

        return redirect()->route('tasks.index');
    }
}

