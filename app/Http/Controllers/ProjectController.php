<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::orderBy('created_at', 'DESC')->get(); // Retrieve all projects from the database
        return view('projects.index', compact('projects')); // Pass the projects to the view
    }

    public function create()
    {
        return view('projects.create');
    }

    public function store(Request $request)
    {
        Project::create($request->all());

        return redirect()->route('projects')->with('success', 'Project added successfully');
    }

    public function show(string $id)
    {
        $project = Project::findOrFail($id);
        return view('projects.show', compact('project'));
    }

    public function edit(string $id)
    {
        $project = Project::findOrFail($id);
        return view('projects.edit', compact('project'));
    }

    public function update(Request $request, string $id)
    {
        $project = Project::findOrFail($id);
        $project->update($request->all());
        return redirect()->route('projects')->with('success', 'Project updated successfully');
    }

    public function destroy(string $id)
    {
        $project = Project::findOrFail($id);
        $project->delete();
        return redirect()->route('projects')->with('success', 'Project deleted successfully!');
    }
}