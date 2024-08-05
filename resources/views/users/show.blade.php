@extends('layouts.app')

@section('title', 'User Details')

@section('contents')
  <div class="container mt-5">
    <div class="row">
      <div class="col-md-12">
        <h2>User Details</h2>
        <table class="table table-bordered">
          <tr>
            <th>ID</th>
            <td>{{ $user->id }}</td>
          </tr>
          <tr>
            <th>Name</th>
            <td>{{ $user->name }}</td>
          </tr>
          <tr>
            <th>Email</th>
            <td>{{ $user->email }}</td>
          </tr>
          <tr>
            <th>Created At</th>
            <td>{{ $user->created_at }}</td>
          </tr>
        </table>
        <a href="{{ route('users.index') }}" class="btn btn-primary">Back to User List</a>
      </div>
    </div>
  </div>
@endsection
