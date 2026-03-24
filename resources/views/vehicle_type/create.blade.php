@extends('adminlte::page')

@section('title', 'Add Vehicle Type')

@section('content_header')
    <h1>Add Vehicle Type</h1>
@stop

@section('content')
<form action="{{ route('vehicle-types.store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label>Type Name</label>
        <input type="text" name="name" class="form-control" placeholder="Enter Vehicle Type">
    </div>
    <button type="submit" class="btn btn-success mt-2">Save</button>
</form>
@stop