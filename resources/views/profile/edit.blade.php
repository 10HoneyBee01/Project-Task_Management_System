@extends('layouts.app')

@section('title', 'Edit Profile')

@section('contents')
    <h1 class="mb-0">Edit Profile</h1>
    <hr />

    <form method="POST" enctype="multipart/form-data" action="{{ route('profile.update') }}">
        @csrf
        <div class="row">
            <div class="col-md-12 border-right">
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="text-right">Profile Settings</h4>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-6">
                            <label class="labels">Name</label>
                            <input type="text" name="name" class="form-control" placeholder="First name" value="{{ old('name', auth()->user()->name) }}">
                        </div>
                        <div class="col-md-6">
                            <label class="labels">Email</label>
                            <input type="text" name="email" disabled class="form-control" value="{{ auth()->user()->email }}" placeholder="Email">
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-6">
                            <label class="labels">Phone</label>
                            <input type="text" name="phone" class="form-control" placeholder="Phone Number" value="{{ old('phone', $profile->phone) }}">
                        </div>
                        <div class="col-md-6">
                            <label class="labels">Address</label>
                            <input type="text" name="address" class="form-control" value="{{ old('address', $profile->address) }}" placeholder="Address">
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-6">
                            <label class="labels">Profile Photo</label>
                            @if($profile->photo)
                                <img src="{{ Storage::url($profile->photo) }}" alt="Profile Photo" width="100">
                            @endif
                            <input type="file" name="photo" class="form-control">
                        </div>
                    </div>
                    <div class="mt-5 text-center">
                        <button id="btn" class="btn btn-primary profile-button" type="submit">Save Profile</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
