@extends('adminlte::page')

@section('title', 'Add Vehicle')

@section('content_header')
    <h1>Add Vehicle</h1>
@stop

@section('content')
<form action="{{ route('vehicles.store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label>Vehicle Name</label>
        <input type="text" name="name" class="form-control" placeholder="Enter Vehicle Name">
    </div>

    <div class="form-group">
        <label>Vehicle Type</label>
        <select name="vehicle_type" class="form-control">
            @foreach($types as $type)
                <option value="{{ $type->id }}">{{ $type->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label>Brand</label>
        <input type="text" name="vehicle_brand" class="form-control">
    </div>
    <div class="form-group">
        <label>Number</label>
        <input type="text" name="vehicle_number" class="form-control">
    </div>
    <div class="form-group">
        <label>Engine CC</label>
        <input type="number" name="vehicle_engine_cc" class="form-control">
    </div>
    <div class="form-group">
        <label>Model</label>
        <input type="text" name="vehicle_model" class="form-control">
    </div>
    <div class="form-group">
        <label>Year</label>
        <input type="text" name="vehicle_year" class="form-control">
    </div>

    <button type="submit" class="btn btn-success mt-2">Save</button>
</form>
@stop