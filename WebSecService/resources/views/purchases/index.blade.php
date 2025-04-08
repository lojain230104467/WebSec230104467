@extends('layouts.master')
@section('title', 'My Purchases')
@section('content')
<div class="row mt-2">
    <div class="col">
        <h1>My Purchases</h1>
    </div>
</div>

@if($purchases->isEmpty())
    <div class="alert alert-info mt-4">
        You haven't made any purchases yet.
    </div>
@else
    @foreach($purchases as $purchase)
        <div class="card mt-2">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3">
                        <img src="{{ asset('images/' . $purchase->product->photo) }}" class="img-thumbnail" alt="{{ $purchase->product->name }}" width="100%">
                    </div>
                    <div class="col-md-9">
                        <h4>{{ $purchase->product->name }}</h4>
                        <table class="table table-striped">
                            <tr>
                                <th width="20%">Purchase Date</th>
                                <td>{{ $purchase->created_at->format('Y-m-d H:i:s') }}</td>
                            </tr>
                            <tr>
                                <th>Price Paid</th>
                                <td>${{ $purchase->price_paid }}</td>
                            </tr>
                            <tr>
                                <th>Product Code</th>
                                <td>{{ $purchase->product->code }}</td>
                            </tr>
                            <tr>
                                <th>Model</th>
                                <td>{{ $purchase->product->model }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endif
@endsection