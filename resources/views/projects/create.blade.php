@extends('layouts.app')

@section('title', 'Create Project')

@section('contents')
    <h1 class="mb-0">Add Project</h1>
    <hr />
    <form action="{{ route('projects.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row mb-3">
            <div class="col">
                <input type="text" name="title" class="form-control" placeholder="Title">
            </div>
            <div class="col">
                <input type="text" name="serial" class="form-control" placeholder="Serial">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <input type="text" name="project_code" class="form-control" placeholder="Project Code">
            </div>
            <div class="col">
                <textarea class="form-control" name="description" placeholder="Description"></textarea>
            </div>
        </div>

        <div class="row">
            <div class="d-grid">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
@endsection
