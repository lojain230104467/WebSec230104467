@extends('layouts.master')
@section('title', 'Insufficient Credit')
@section('content')
<h1>Insufficient Credit</h1>
<p>You don’t have enough credit to buy {{ $product->name }} (${{ $product->price }}).</p>
<p>Your current credit: ${{ auth()->user()->credit }}</p>
<a href="{{ route('products.index') }}" class="btn btn-primary">Back to Products</a>
@endsection