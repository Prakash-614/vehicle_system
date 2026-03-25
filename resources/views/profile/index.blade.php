@extends('adminlte::page')

@section('title', 'My Profile')

@section('content_header')
    <h1><i class="fas fa-user-circle mr-2"></i>My Profile</h1>
@stop

@section('content')

{{-- Success Alerts --}}
@if(session('success'))
    <x-adminlte-alert theme="success" title="Success" dismissable>
        {{ session('success') }}
    </x-adminlte-alert>
@endif

@if(session('password_success'))
    <x-adminlte-alert theme="success" title="Password Updated" dismissable>
        {{ session('password_success') }}
    </x-adminlte-alert>
@endif

<div class="row">

    {{-- Left Column: Avatar Card --}}
    <div class="col-md-4">
        <div class="card card-primary card-outline">
            <div class="card-body text-center pt-4 pb-4">

                {{-- Avatar with initials --}}
                <div class="profile-avatar mx-auto mb-3 d-flex align-items-center justify-content-center"
                     style="
                        width: 110px; height: 110px;
                        border-radius: 50%;
                        background: linear-gradient(135deg, #3c8dbc 0%, #1a4f7a 100%);
                        font-size: 2.6rem;
                        font-weight: 700;
                        color: #fff;
                        letter-spacing: 2px;
                        box-shadow: 0 4px 18px rgba(60,141,188,0.4);
                        border: 4px solid #fff;
                        user-select: none;
                     ">
                    {{ strtoupper(substr($user->name, 0, 1)) }}{{ strtoupper(substr(strstr($user->name, ' ') ?: '_', 1, 1)) }}
                </div>

                <h4 class="mb-0 font-weight-bold">{{ $user->name }}</h4>
                <p class="text-muted mb-1">{{ $user->email }}</p>

                <span class="badge badge-success px-3 py-1 mt-1">
                    <i class="fas fa-circle" style="font-size:8px; vertical-align:middle;"></i>
                    Active
                </span>

                <hr>

                <div class="text-left px-2">
                    <p class="mb-2">
                        <i class="fas fa-id-badge mr-2 text-primary"></i>
                        <strong>User ID:</strong> #{{ $user->id }}
                    </p>
                    <p class="mb-2">
                        <i class="fas fa-calendar-alt mr-2 text-primary"></i>
                        <strong>Joined:</strong> {{ $user->created_at->format('M d, Y') }}
                    </p>
                    <p class="mb-2">
                        <i class="fas fa-clock mr-2 text-primary"></i>
                        <strong>Last Updated:</strong> {{ $user->updated_at->diffForHumans() }}
                    </p>
                    @if($user->email_verified_at)
                    <p class="mb-0">
                        <i class="fas fa-check-circle mr-2 text-success"></i>
                        <strong>Email Verified:</strong>
                        <span class="text-success">Yes</span>
                    </p>
                    @else
                    <p class="mb-0">
                        <i class="fas fa-times-circle mr-2 text-danger"></i>
                        <strong>Email Verified:</strong>
                        <span class="text-danger">No</span>
                    </p>
                    @endif
                </div>

            </div>
        </div>
    </div>

    {{-- Right Column: Forms --}}
    <div class="col-md-8">

        {{-- Profile Info Form --}}
        <div class="card card-primary card-outline">
            <div class="card-header">
                <h3 class="card-title">
                    <i class="fas fa-user-edit mr-2"></i>Edit Profile Information
                </h3>
            </div>
            <form action="{{ route('profile.update') }}" method="POST">
                @csrf
                @method('PUT')
                <div class="card-body">

                    {{-- Name --}}
                    <div class="form-group">
                        <label for="name">
                            <i class="fas fa-user mr-1 text-muted"></i> Full Name
                        </label>
                        <input
                            type="text"
                            name="name"
                            id="name"
                            class="form-control @error('name') is-invalid @enderror"
                            value="{{ old('name', $user->name) }}"
                            placeholder="Enter your full name"
                            required
                        >
                        @error('name')
                            <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>

                    {{-- Email --}}
                    <div class="form-group">
                        <label for="email">
                            <i class="fas fa-envelope mr-1 text-muted"></i> Email Address
                        </label>
                        <input
                            type="email"
                            name="email"
                            id="email"
                            class="form-control @error('email') is-invalid @enderror"
                            value="{{ old('email', $user->email) }}"
                            placeholder="Enter your email"
                            required
                        >
                        @error('email')
                            <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>

                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save mr-1"></i> Save Changes
                    </button>
                </div>
            </form>
        </div>

        {{-- Change Password Form --}}
        <div class="card card-warning card-outline" id="change-password">
            <div class="card-header">
                <h3 class="card-title">
                    <i class="fas fa-lock mr-2"></i>Change Password
                </h3>
            </div>
            <form action="{{ route('profile.password') }}" method="POST">
                @csrf
                @method('PUT')
                <div class="card-body">

                    {{-- Current Password --}}
                    <div class="form-group">
                        <label for="current_password">
                            <i class="fas fa-key mr-1 text-muted"></i> Current Password
                        </label>
                        <input
                            type="password"
                            name="current_password"
                            id="current_password"
                            class="form-control @error('current_password') is-invalid @enderror"
                            placeholder="Enter your current password"
                        >
                        @error('current_password')
                            <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>

                    {{-- New Password --}}
                    <div class="form-group">
                        <label for="password">
                            <i class="fas fa-lock mr-1 text-muted"></i> New Password
                        </label>
                        <input
                            type="password"
                            name="password"
                            id="password"
                            class="form-control @error('password') is-invalid @enderror"
                            placeholder="Enter new password (min 8 characters)"
                        >
                        @error('password')
                            <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>

                    {{-- Confirm Password --}}
                    <div class="form-group mb-0">
                        <label for="password_confirmation">
                            <i class="fas fa-lock mr-1 text-muted"></i> Confirm New Password
                        </label>
                        <input
                            type="password"
                            name="password_confirmation"
                            id="password_confirmation"
                            class="form-control"
                            placeholder="Confirm new password"
                        >
                    </div>

                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-warning">
                        <i class="fas fa-sync-alt mr-1"></i> Update Password
                    </button>
                </div>
            </form>
        </div>

        {{-- Account Stats --}}
        <div class="card card-info card-outline">
            <div class="card-header">
                <h3 class="card-title">
                    <i class="fas fa-chart-bar mr-2"></i>Account Overview
                </h3>
            </div>
            <div class="card-body p-0">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <span><i class="fas fa-car mr-2 text-info"></i>Total Vehicles</span>
                        <span class="badge badge-info badge-pill px-3">{{ \App\Models\Vehicle::count() }}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <span><i class="fas fa-list mr-2 text-success"></i>Vehicle Types</span>
                        <span class="badge badge-success badge-pill px-3">{{ \App\Models\VehicleType::count() }}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <span><i class="fas fa-users mr-2 text-primary"></i>Total Users</span>
                        <span class="badge badge-primary badge-pill px-3">{{ \App\Models\User::count() }}</span>
                    </li>
                </ul>
            </div>
        </div>

    </div>
</div>

@stop

@section('css')
<style>
    .profile-avatar {
        transition: transform 0.2s ease;
    }
    .profile-avatar:hover {
        transform: scale(1.05);
    }
    .card.card-outline.card-primary {
        border-top: 3px solid #3c8dbc;
    }
    .card.card-outline.card-warning {
        border-top: 3px solid #f39c12;
    }
    .card.card-outline.card-info {
        border-top: 3px solid #00c0ef;
    }
</style>
@stop