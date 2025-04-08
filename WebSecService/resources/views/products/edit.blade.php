@extends('layouts.master')
@section('title', isset($product->id) ? 'Edit Product' : 'Add Product')
@section('content')

<div class="container">
    <h1>{{ isset($product->id) ? 'Edit Product' : 'Add Product' }}</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ isset($product->id) ? route('products.update', $product->id) : route('products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @if(isset($product->id))
            @method('PUT')
        @endif

        <div class="row mb-3">
            <div class="col-md-6">
                <label for="code" class="form-label">Code:</label>
                <input type="text" class="form-control" id="code" name="code" value="{{ old('code', $product->code) }}" required>
            </div>
            <div class="col-md-6">
                <label for="model" class="form-label">Model:</label>
                <input type="text" class="form-control" id="model" name="model" value="{{ old('model', $product->model) }}" required>
            </div>
        </div>

        <div class="mb-3">
            <label for="name" class="form-label">Name:</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $product->name) }}" required>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label for="price" class="form-label">Price:</label>
                <input type="number" step="0.01" min="0" class="form-control" id="price" name="price" value="{{ old('price', $product->price) }}" required>
            </div>
            <div class="col-md-6">
                <label for="stock" class="form-label">Stock:</label>
                <input type="number" min="0" class="form-control" id="stock" name="stock" value="{{ old('stock', $product->stock) }}" required>
            </div>
        </div>

        <div class="mb-3">
            <label for="photo" class="form-label">Photo:</label>
            @if($product->photo)
                <div class="mb-2">
                    <img src="{{ asset('images/' . $product->photo) }}" alt="{{ $product->name }}" class="img-thumbnail" style="max-width: 200px">
                </div>
            @endif
            <input type="file" class="form-control" id="photo" name="photo" accept="image/*">
            <small class="form-text text-muted">Leave empty to keep the current image</small>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description:</label>
            <textarea class="form-control" id="description" name="description" rows="3" required>{{ old('description', $product->description) }}</textarea>
        </div>

        <div class="mb-3">
            <button type="submit" class="btn btn-primary">{{ isset($product->id) ? 'Update' : 'Add' }} Product</button>
            <a href="{{ route('products.index') }}" class="btn btn-secondary">Cancel</a>
        </div>
    </form>
</div>
@endsection
