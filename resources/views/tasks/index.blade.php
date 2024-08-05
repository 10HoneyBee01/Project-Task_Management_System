@extends('layouts.app')

@section('title', 'Tasks for Project: ' . $project->title)


@section('contents')
    <div class="d-flex align-items-center justify-content-between">
        <h1 class="mb-0">Tasks for Project: {{ $project->name }}</h1>
        <a href="{{ route('projects.tasks.create', $project->id) }}" class="btn btn-primary">Add Task</a>
    </div>
    <hr />
    @if(Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('success') }}
        </div>
    @endif
    <table class="table table-hover">
        <thead class="table-primary">
            <tr>
                <th>Title</th>
                <th>Description</th>
                <th>Status</th>
                <th>Assigned User</th>
                <th>Assigned Date</th>
                <th>Due Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @if($tasks->count() > 0)
                @foreach($tasks as $task)
                    <tr>
                        <td class="align-middle">{{ $task->title }}</td>
                        <td class="align-middle">{{ $task->description }}</td>
                        <td class="align-middle">{{ $task->status }}</td>
                        <td class="align-middle">
                            @if($task->user)
                                {{ $task->user->name }}
                            @else
                                Not Assigned
                            @endif
                        </td>
                        <td class="align-middle">
                            @if($task->assigned_date)
                                {{ $task->assigned_date->format('Y-m-d') }}
                            @else
                                Not Set
                            @endif
                        </td>
                        <td class="align-middle">
                            @if($task->due_date)
                                {{ $task->due_date->format('Y-m-d') }}
                            @else
                                Not Set
                            @endif
                        </td>
                        <td class="align-middle">
                            <div class="btn-group" role="group" aria-label="Task Actions">
                                <a href="{{ route('projects.tasks.show', [$project->id, $task->id]) }}" class="btn btn-secondary">View</a>
                                <a href="{{ route('projects.tasks.edit', [$project->id, $task->id]) }}" class="btn btn-warning">Edit</a>
                                <form action="{{ route('projects.tasks.destroy', [$project->id, $task->id]) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this task?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td class="text-center" colspan="7">No tasks found for this project.</td>
                </tr>
            @endif
        </tbody>
    </table>
@endsection
