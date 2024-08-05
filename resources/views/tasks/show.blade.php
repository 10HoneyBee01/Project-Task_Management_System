@extends('layouts.app')

@section('title', 'Task Details')

@section('contents')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <h2>Task Details</h2>

                <table class="table table-bordered">
                    <tr>
                        <th>Title</th>
                        <td>{{ $task->title }}</td>
                    </tr>
                    <tr>
                        <th>Description</th>
                        <td>{{ $task->description }}</td>
                    </tr>
                    <tr>
                        <th>Project</th>
                        <td>{{ $project->title }}</td>
                    </tr>
                    <tr>
                        <th>Status</th>
                        <td>{{ $task->status }}</td>
                    </tr>
                    <tr>
                        <th>Assigned To</th>
                        <td>{{ $task->user ? $task->user->name : 'Not Assigned' }}</td>
                    </tr>
                    <tr>
                        <th>Assigned Date</th>
                        <td>{{ $task->assigned_date ? $task->assigned_date->format('Y-m-d') : 'Not Set' }}</td>
                    </tr>
                    <tr>
                        <th>Due Date</th>
                        <td>{{ $task->due_date ? $task->due_date->format('Y-m-d') : 'Not Set' }}</td>
                    </tr>
                </table>

                <a href="{{ route('projects.tasks.edit', [$project->id, $task->id]) }}" class="btn btn-warning">Edit</a>
                <form action="{{ route('projects.tasks.destroy', [$project->id, $task->id]) }}" method="POST"
                    style="display:inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
                <a href="{{ route('projects.tasks.index', $project->id) }}" class="btn btn-secondary">Back to Tasks</a>

                <!-- Comments Section -->
                <div class="mt-4">
                    <h3>Comments</h3>

                    @if ($task->comments->count())
                        <ul class="list-group">
                            @foreach ($task->comments as $comment)
                                <li class="list-group-item">
                                    <strong>{{ $comment->user->name }}:</strong> {{ $comment->content }}
                                    @if (Auth::check() && Auth::id() == $comment->user_id)
                                        <form action="{{ route('comments.destroy', $comment->id) }}" method="POST"
                                            style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm float-right">Delete</button>
                                        </form>
                                    @endif
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <p>No comments yet.</p>
                    @endif

                    @if (Auth::check())
                        <form action="{{ route('comments.store', $task->id) }}" method="POST" class="mt-3">
                            @csrf
                            <div class="form-group">
                                <label for="content">Comment</label>
                                <textarea name="content" id="content" class="form-control" required></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Add Comment</button>
                        </form>
                    @else
                        <p>Please <a href="{{ route('login') }}">login</a> to comment.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
