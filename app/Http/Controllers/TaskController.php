<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index($projectId)
    {
        $project = Project::findOrFail($projectId);
        $tasks = $project->tasks; // Retrieve tasks associated with the project
        return view('tasks.index', compact('project', 'tasks'));
    }


    public function create($projectId)
    {
        $project = Project::findOrFail($projectId);
        $users = User::all();
        return view('tasks.create', compact('project', 'users'));
    }

    public function store(Request $request, $projectId)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'status' => 'required|string|in:Pending,In Progress,Completed',
            'user_id' => 'required|exists:users,id',
            'assigned_date' => 'nullable|date',
            'due_date' => 'nullable|date',
        ]);

        // Store the task
        Task::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'status' => $request->input('status'),
            'user_id' => $request->input('user_id'),
            'assigned_date' => $request->input('assigned_date'),
            'due_date' => $request->input('due_date'),
            'project_id' => $projectId,
        ]);

        return redirect()->route('projects.tasks.index', $projectId)->with('success', 'Task created successfully.');
    }



    public function show($projectId, $taskId)
    {
        $project = Project::findOrFail($projectId);
        $task = Task::with('comments.user')->findOrFail($taskId);

        return view('tasks.show', compact('project', 'task'));
    }


    public function edit($projectId, $taskId)
    {
        $project = Project::findOrFail($projectId);
        $task = Task::findOrFail($taskId);
        $users = User::all();
        return view('tasks.edit', compact('project', 'task', 'users'));
    }

    public function update(Request $request, $projectId, $taskId)
    {
        $task = Task::findOrFail($taskId);

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'assigned_to' => 'required|exists:users,id',
        ]);

        $task->update([
            'title' => $request->title,
            'description' => $request->description,
            'user_id' => $request->assigned_to,
        ]);

        return redirect()->route('projects.tasks.index', $projectId)->with('success', 'Task updated successfully');
    }

    public function destroy($projectId, $taskId)
    {
        $task = Task::findOrFail($taskId);
        $task->delete();
        return redirect()->route('projects.tasks.index', $projectId)->with('success', 'Task deleted successfully');
    }
}