@extends('layouts.app')

@section('title', 'User List')

@section('contents')
  <div class="container mt-5">
    <div class="row">
      <div class="col-md-12">
        <h2 class="mb-4">User List</h2>
        <a href="{{ route('users.create') }}" class="btn btn-primary mb-3">Add New User</a>
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>ID</th>
              <th>Name</th>
              <th>Email</th>
              <th>Created At</th>
              <th>Assigned Tasks</th> <!-- New column for tasks -->
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            @foreach($users as $user)
              <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->created_at }}</td>
                <td>
                  @if($user->tasks->count() > 0)
                    <ul>
                      @foreach($user->tasks as $task)
                        <li>{{ $task->title }} (Due: {{ $task->due_date }})</li>
                      @endforeach
                    </ul>
                  @else
                    No tasks assigned
                  @endif
                </td>
                <td>
                  <a href="{{ route('users.show', $user->id) }}" class="btn btn-info btn-sm">View</a>
                  <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning btn-sm">Edit</a>
                  <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                  </form>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
@endsection
