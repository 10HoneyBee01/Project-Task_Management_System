@extends('layouts.app')

@section('title', 'Show Projects')

@section('contents')
    <h1 class="mb-0">Project Details</h1>
    <hr />
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Title</label>
            <input type="text" name="title" class="form-control" placeholder="Title" value="{{ $project->title }}" readonly>
        </div>
        <div class="col mb-3">
            <label class="form-label">Serial</label>
            <input type="text" name="serial" class="form-control" placeholder="Serial" value="{{ $project->serial }}" readonly>
        </div>
    </div>
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Project Code</label>
            <input type="text" name="project_code" class="form-control" placeholder="Project Code" value="{{ $project->project_code }}" readonly>
        </div>
        <div class="col mb-3">
            <label class="form-label">Description</label>
            <textarea class="form-control" name="description" placeholder="Description" readonly>{{ $project->description }}</textarea>
        </div>
    </div>
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Created At</label>
            <input type="text" name="created_at" class="form-control" placeholder="Created At" value="{{ $project->created_at }}" readonly>
        </div>
        <div class="col mb-3">
            <label class="form-label">Updated At</label>
            <input type="text" name="updated_at" class="form-control" placeholder="Updated At" value="{{ $project->updated_at }}" readonly>
        </div>
    </div>
@endsection
