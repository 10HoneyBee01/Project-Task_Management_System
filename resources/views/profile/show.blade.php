@extends('layouts.app')

@section('title', 'Profile')

@section('contents')
    <h1 class="mb-0">Profile</h1>
    <hr />
    <p>Name: {{ auth()->user()->name ?? 'N/A' }}</p>
    <p>Email: {{ auth()->user()->email ?? 'N/A' }}</p>
    <p>Phone: {{ $profile->phone ?? 'N/A' }}</p>
    <p>Address: {{ $profile->address ?? 'N/A' }}</p>
    @if($profile->photo)
        <p>{{ asset('storage/' . $profile->photo) }}</p> <!-- Debugging line -->
        <img src="{{ asset('storage/' . $profile->photo) }}" alt="Profile Photo" width="100">
    @endif
    <a href="{{ route('profile.edit') }}" class="btn btn-primary">Edit Profile</a>
@endsection
