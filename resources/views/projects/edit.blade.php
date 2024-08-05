@extends('layouts.app')

@section('title', 'Edit Project')

@section('contents')
    <h1 class="mb-0">Edit Project</h1>
    <hr />
    <form action="{{ route('projects.update', $project->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col mb-3">
                <label class="form-label">Title</label>
                <input type="text" name="title" class="form-control" placeholder="Title" value="{{ $project->title }}">
            </div>
            <div class="col mb-3">
                <label class="form-label">Serial</label>
                <input type="text" name="serial" class="form-control" placeholder="Serial" value="{{ $project->serial }}">
            </div>
        </div>
        <div class="row">
            <div class="col mb-3">
                <label class="form-label">Project Code</label>
                <input type="text" name="project_code" class="form-control" placeholder="Project Code" value="{{ $project->project_code }}">
            </div>
            <div class="col mb-3">
                <label class="form-label">Description</label>
                <textarea class="form-control" name="description" placeholder="Description">{{ $project->description }}</textarea>
            </div>
        </div>
        <div class="row">
            <div class="d-grid">
                <button class="btn btn-warning">Update</button>
            </div>
        </div>
    </form>
@endsection
