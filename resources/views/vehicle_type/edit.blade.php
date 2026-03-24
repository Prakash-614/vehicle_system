@extends('adminlte::page')

@section('title', 'Edit Vehicle Type')

@section('content_header')
    <h1>Edit Vehicle Type</h1>
@stop

@section('content')
<form action="{{ route('vehicle-types.update', $type->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label>Type Name</label>
        <input type="text" name="name" value="{{ $type->name }}" class="form-control">
    </div>
    <button type="submit" class="btn btn-success mt-2">Update</button>
</form>
@stop