<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Task;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $projects_count = Project::count();
        $tasks_count = Task::count();
        $users_count = User::count();
        $projects_completed = Project::where('status', 'completed')->count();
        $projects_in_progress = Project::where('status', 'in_progress')->count();
        $projects_pending = Project::where('status', 'pending')->count();
        $tasks_completed = Task::where('status', 'completed')->count();
        $tasks_in_progress = Task::where('status', 'in_progress')->count();
        $tasks_pending = Task::where('status', 'pending')->count();
        $admins_count = User::where('role', 'admin')->count();
        $users_count = User::where('role', 'user')->count();

        return view('dashboard', compact(
            'projects_count',
            'tasks_count',
            'users_count',
            'projects_completed',
            'projects_in_progress',
            'projects_pending',
            'tasks_completed',
            'tasks_in_progress',
            'tasks_pending',
            'admins_count',
            'users_count'
        ));
    }
}