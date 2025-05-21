@extends('layouts.master')
@section('title', 'Manage Inventory')
@section('content')
<div class="row mt-2">
    <div class="col col-10">
        <h1>Manage Inventory</h1>
    </div>
</div>

@if(session('message'))
<div class="alert alert-success">
    {{ session('message') }}
</div>
@endif

@if($errors->any())
<div class="alert alert-danger">
    @foreach($errors->all() as $error)
    <p>{{ $error }}</p>
    @endforeach
</div>
@endif

<div class="card mt-2">
    <div class="card-body">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Current Stock</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->stock_quantity }} items</td>
                    <td>
                        <form action="{{ route('products_update_stock', $product->id) }}" method="POST" class="d-inline">
                            @csrf
                            <div class="input-group">
                                <input type="number" name="quantity" class="form-control" placeholder="Add Stock" min="1" required>
                                <button type="submit" class="btn btn-success">Update Stock</button>
                            </div>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection 