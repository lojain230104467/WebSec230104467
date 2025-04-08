@extends('layouts.master')
@section('title', 'Add Employee')
@section('content')
<h1>Add Employee</h1>
<form method="POST" action="{{ route('employees.store') }}">
    @csrf
    <input name="name" placeholder="Name" required class="form-control mb-2">
    <input name="email" type="email" placeholder="Email" required class="form-control mb-2">
    <input name="password" type="password" placeholder="Password" required class="form-control mb-2">
    <button type="submit" class="btn btn-primary">Add Employee</button>
</form>
@endsection