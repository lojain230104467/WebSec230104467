@extends('layouts.master')
@section('title', 'Customers')
@section('content')
<h1>Customers</h1>
<table class="table table-striped">
    <thead>
        <tr><th>Name</th><th>Email</th><th>Credit</th></tr>
    </thead>
    <tbody>
        @foreach ($customers as $customer)
            <tr>
                <td>{{ $customer->name }}</td>
                <td>{{ $customer->email }}</td>
                <td>${{ $customer->credit }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection