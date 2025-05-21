@extends('layouts.master')
@section('title', 'My Purchases')
@section('content')
<div class="row mt-2">
    <div class="col col-10">
        <h1>My Purchases</h1>
    </div>
</div>

@if(session('message'))
<div class="alert alert-success">
    {{ session('message') }}
</div>
@endif

<div class="card mt-2">
    <div class="card-body">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Product</th>
                    <th scope="col">Price</th>
                    <th scope="col">Purchase Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach($purchases as $purchase)
                <tr>
                    <td>{{ $purchase->id }}</td>
                    <td>{{ $purchase->product->name }}</td>
                    <td>${{ number_format($purchase->price_at_purchase, 2) }}</td>
                    <td>{{ $purchase->created_at->format('Y-m-d H:i:s') }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection 