@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <form method="POST" action="{{ route('vehicle-types.store') }}">
    @csrf
    <input type="text" name="name" placeholder="Vehicle Type">
    <button type="submit">Save</button>
</form>
@stop