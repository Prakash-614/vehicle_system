@extends('adminlte::page')

@section('title', 'Vehicle Types')

@section('content_header')
    <h1>Vehicle Types</h1>
@stop

@section('content')
@if(session('success'))
    <x-adminlte-alert theme="success" title="Success" dismissable>
        {{ session('success') }}
    </x-adminlte-alert>
@endif

<a class="btn btn-primary mb-2" href="{{ route('vehicle-types.create') }}">Add Vehicle Type</a>

<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($types as $type)
        <tr>
            <td>{{ $type->id }}</td>
            <td>{{ $type->name }}</td>
            <td>
                <a class="btn btn-warning btn-sm" href="{{ route('vehicle-types.edit', $type->id) }}">Edit</a>

                <form action="{{ route('vehicle-types.destroy', $type->id) }}" method="POST" style="display:inline">
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