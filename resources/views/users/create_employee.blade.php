@extends('layouts.master')
@section('title', 'Create Employee')
@section('content')
<div class="row mt-2">
    <div class="col col-10">
        <h1>Create Employee Account</h1>
    </div>
</div>

<div class="card mt-2">
    <div class="card-body">
        <form action="{{ route('store_employee') }}" method="POST">
            @csrf
            @foreach($errors->all() as $error)
            <div class="alert alert-danger">
                <strong>Error!</strong> {{ $error }}
            </div>
            @endforeach

            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>

            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Confirm Password</label>
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
            </div>

            <button type="submit" class="btn btn-primary">Create Employee</button>
            <a href="{{ route('users') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</div>
@endsection 