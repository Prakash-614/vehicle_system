@extends('adminlte::page')

@section('title', 'Edit Vehicle')

@section('content_header')
    <h1>Edit Vehicle</h1>
@stop

@section('content')
<form action="{{ route('vehicles.update', $vehicle->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="form-group">
        <label>Vehicle Name</label>
        <input type="text" name="name" value="{{ $vehicle->name }}" class="form-control">
    </div>

    <div class="form-group">
        <label>Vehicle Type</label>
        <select name="vehicle_type" class="form-control">
            @foreach($types as $type)
                <option value="{{ $type->id }}" {{ $vehicle->vehicle_type == $type->id ? 'selected' : '' }}>
                    {{ $type->name }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label>Brand</label>
        <input type="text" name="vehicle_brand" value="{{ $vehicle->vehicle_brand }}" class="form-control">
    </div>
    <div class="form-group">
        <label>Number</label>
        <input type="text" name="vehicle_number" value="{{ $vehicle->vehicle_number }}" class="form-control">
    </div>
    <div class="form-group">
        <label>Engine CC</label>
        <input type="number" name="vehicle_engine_cc" value="{{ $vehicle->vehicle_engine_cc }}" class="form-control">
    </div>
    <div class="form-group">
        <label>Model</label>
        <input type="text" name="vehicle_model" value="{{ $vehicle->vehicle_model }}" class="form-control">
    </div>
    <div class="form-group">
        <label>Year</label>
        <input type="text" name="vehicle_year" value="{{ $vehicle->vehicle_year }}" class="form-control">
    </div>

    <button type="submit" class="btn btn-success mt-2">Update</button>
</form>
@stop