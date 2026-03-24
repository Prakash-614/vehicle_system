@extends('adminlte::page')

@section('title', 'Vehicles')

@section('content_header')
    <h1>Vehicles</h1>
@stop

@section('content')
@if(session('success'))
    <x-adminlte-alert theme="success" title="Success" dismissable>
        {{ session('success') }}
    </x-adminlte-alert>
@endif

<a class="btn btn-primary mb-2" href="{{ route('vehicles.create') }}">Add Vehicle</a>

<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Type</th>
            <th>Brand</th>
            <th>Number</th>
            <th>Engine CC</th>
            <th>Model</th>
            <th>Year</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($vehicles as $vehicle)
        <tr>
            <td>{{ $vehicle->id }}</td>
            <td>{{ $vehicle->name }}</td>
            <td>{{ $vehicle->type->name }}</td>
            <td>{{ $vehicle->vehicle_brand }}</td>
            <td>{{ $vehicle->vehicle_number }}</td>
            <td>{{ $vehicle->vehicle_engine_cc }}</td>
            <td>{{ $vehicle->vehicle_model }}</td>
            <td>{{ $vehicle->vehicle_year }}</td>
            <td>
                <a class="btn btn-warning btn-sm" href="{{ route('vehicles.edit', $vehicle->id) }}">Edit</a>

                <form action="{{ route('vehicles.destroy', $vehicle->id) }}" method="POST" style="display:inline">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@stop