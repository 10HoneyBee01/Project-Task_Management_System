@extends('layouts.app')

@section('title', 'Edit Task')

@section('contents')
  <div class="container mt-5">
    <div class="row">
      <div class="col-md-12">
        <h2>Edit Task</h2>

        @if ($errors->any())
          <div class="alert alert-danger">
            <ul>
              @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
        @endif

        <form action="{{ route('projects.tasks.update', [$project->id, $task->id]) }}" method="POST">
          @csrf
          @method('PUT')
          <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $task->title) }}" required>
          </div>
          <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" id="description" name="description" required>{{ old('description', $task->description) }}</textarea>
          </div>
          <div class="form-group">
            <label for="status">Status</label>
            <select class="form-control" id="status" name="status" required>
              <option value="" disabled>Select Status</option>
              <option value="Pending" {{ old('status', $task->status) == 'Pending' ? 'selected' : '' }}>Pending</option>
              <option value="In Progress" {{ old('status', $task->status) == 'In Progress' ? 'selected' : '' }}>In Progress</option>
              <option value="Completed" {{ old('status', $task->status) == 'Completed' ? 'selected' : '' }}>Completed</option>
            </select>
          </div>
          <div class="form-group">
            <label for="assigned_to">Assign to User</label>
            <select class="form-control" id="assigned_to" name="user_id" required>
              <option value="" disabled>Select User</option>
              @foreach($users as $user)
                <option value="{{ $user->id }}" {{ old('user_id', $task->user_id) == $user->id ? 'selected' : '' }}>
                  {{ $user->name }}
                </option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="assigned_date">Assigned Date</label>
            <input type="date" class="form-control" id="assigned_date" name="assigned_date" value="{{ old('assigned_date', $task->assigned_date ? $task->assigned_date->format('Y-m-d') : '') }}">
          </div>
          <div class="form-group">
            <label for="due_date">Due Date</label>
            <input type="date" class="form-control" id="due_date" name="due_date" value="{{ old('due_date', $task->due_date ? $task->due_date->format('Y-m-d') : '') }}">
          </div>
          <button type="submit" class="btn btn-success">Update Task</button>
          <a href="{{ route('projects.tasks.index', $project->id) }}" class="btn btn-secondary">Cancel</a>
        </form>
      </div>
    </div>
  </div>
@endsection
