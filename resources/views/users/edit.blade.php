@extends('layouts.app')

@section('title', 'Edit User')

@section('contents')
  <div class="container mt-5">
    <div class="row">
      <div class="col-md-12">
        <h2>Edit User</h2>
        <form action="{{ route('users.update', $user->id) }}" method="POST">
          @csrf
          @method('PUT')
          <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" required>
          </div>
          <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" required>
          </div>
          <button type="submit" class="btn btn-success">Update User</button>
          <a href="{{ route('users.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
      </div>
    </div>
  </div>
@endsection
