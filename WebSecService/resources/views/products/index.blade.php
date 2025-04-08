@extends('layouts.master')
@section('title', 'Products')
@section('content')
<div class="row mt-2">
    <div class="col col-10">
        <h1>Products</h1>
    </div>
    <div class="col col-2">
        @can('add_products')
            <a href="{{ route('products.edit') }}" class="btn btn-success form-control">Add Product</a>
        @endcan
    </div>
</div>

<!-- Search/Filter Form -->
<form method="GET" action="{{ route('products.index') }}">
    <div class="row">
        <div class="col col-sm-2">
            <input name="keywords" type="text" class="form-control" placeholder="Search Keywords" value="{{ request()->keywords }}" />
        </div>
        <div class="col col-sm-2">
            <input name="min_price" type="number" step="0.01" class="form-control" placeholder="Min Price" value="{{ request()->min_price }}" />
        </div>
        <div class="col col-sm-2">
            <input name="max_price" type="number" step="0.01" class="form-control" placeholder="Max Price" value="{{ request()->max_price }}" />
        </div>
        <div class="col col-sm-2">
            <select name="order_by" class="form-select">
                <option value="" {{ request()->order_by == "" ? "selected" : "" }} disabled>Order By</option>
                <option value="name" {{ request()->order_by == "name" ? "selected" : "" }}>Name</option>
                <option value="price" {{ request()->order_by == "price" ? "selected" : "" }}>Price</option>
            </select>
        </div>
        <div class="col col-sm-2">
            <select name="order_direction" class="form-select">
                <option value="" {{ request()->order_direction == "" ? "selected" : "" }} disabled>Order Direction</option>
                <option value="ASC" {{ request()->order_direction == "ASC" ? "selected" : "" }}>ASC</option>
                <option value="DESC" {{ request()->order_direction == "DESC" ? "selected" : "" }}>DESC</option>
            </select>
        </div>
        <div class="col col-sm-1">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
        <div class="col col-sm-1">
            <button type="reset" class="btn btn-danger">Reset</button>
        </div>
    </div>
</form>

<!-- Success/Error Messages -->
@if (session('success'))
    <p class="text-success mt-2">{{ session('success') }}</p>
@endif
@if (session('error'))
    <p class="text-danger mt-2">{{ session('error') }}</p>
@endif

<!-- Product List -->
@foreach ($products as $product)
    <div class="card mt-2">
        <div class="card-body">
            <div class="row">
                <div class="col col-sm-12 col-lg-4">
                    <img src="{{ asset('images/' . $product->photo) }}" class="img-thumbnail" alt="{{ $product->name }}" width="100%">
                </div>
                <div class="col col-sm-12 col-lg-8 mt-3">
                    <div class="row mb-2">
                        <div class="col-8">
                            <h3>{{ $product->name }}</h3>
                        </div>
                        <div class="col col-2">
                            @can('edit_products')
                                <a href="{{ route('products.edit', $product->id) }}" class="btn btn-success form-control">Edit</a>
                            @endcan
                        </div>
                        <div class="col col-2">
                            @can('delete_products')
                                <form method="POST" action="{{ route('products.destroy', $product->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger form-control">Delete</button>
                                </form>
                            @endcan
                        </div>
                    </div>

                    <table class="table table-striped">
                        <tr><th width="20%">Name</th><td>{{ $product->name }}</td></tr>
                        <tr><th>Model</th><td>{{ $product->model }}</td></tr>
                        <tr><th>Code</th><td>{{ $product->code }}</td></tr>
                        <tr><th>Price</th><td>${{ $product->price }}</td></tr>
                        <tr><th>Stock</th><td>{{ $product->stock }}</td></tr>
                        <tr><th>Description</th><td>{{ $product->description }}</td></tr>
                    </table>

                    <!-- Customer Buy Button -->
                    @role('Customer')
                        @if(auth()->user()->credit >= $product->price && $product->stock > 0)
                            <form method="POST" action="{{ route('products.buy', $product->id) }}">
                                @csrf
                                <button type="submit" class="btn btn-primary">Buy</button>
                            </form>
                        @elseif($product->stock <= 0)
                            <button class="btn btn-secondary" disabled>Out of Stock</button>
                        @else
                            <button class="btn btn-secondary" disabled>Insufficient Credit</button>
                        @endif
                    @endrole
                </div>
            </div>
        </div>
    </div>
@endforeach

<!-- Employee Features -->
@can('add_products')
    <h2 class="mt-4">Add Product</h2>
    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input name="code" placeholder="Code" required class="form-control mb-2">
        <input name="name" placeholder="Name" required class="form-control mb-2">
        <input name="price" type="number" step="0.01" min="0" placeholder="Price" required class="form-control mb-2">
        <input name="model" placeholder="Model" required class="form-control mb-2">
        <input name="description" placeholder="Description" class="form-control mb-2">
        <input type="file" name="photo" accept="image/*" class="form-control mb-2" required>
        <input name="stock" type="number" min="0" placeholder="Stock" required class="form-control mb-2">
        <button type="submit" class="btn btn-primary">Add Product</button>
    </form>
@endcan
@endsection