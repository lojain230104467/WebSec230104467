@extends('layouts.master')

@section('content')
<div class="container mt-5">
    <h2 class="text-center mb-4">Product Catalog</h2>

    @if($products->isEmpty())
        <p class="text-center text-muted">No products available at the moment.</p>
    @else
        <div class="row">
            @foreach($products as $product)
            <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                <div class="card h-100 shadow-sm">
                    
                    <!-- Product Image with Storage Handling -->
                    @if(!empty($product->image) && \Illuminate\Support\Facades\Storage::exists('public/images/' . $product->image))
                        <img src="{{ Storage::url('public/images/' . $product->image) }}" class="card-img-top" alt="{{ e($product->name) }}">
                    @else
                        <img src="{{ asset('images/default-product.jpg') }}" class="card-img-top" alt="Default Product Image">
                    @endif

                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">{{ e($product->name) }}</h5>
                        <p class="card-text">{{ e($product->description ?? 'No description available.') }}</p>
                        <h6 class="text-primary">Price: {{ number_format($product->price, 2) }} EGP</h6>
                        
                        <p class="text-muted">Stock: <strong>{{ $product->quantity }}</strong></p>

                        <div class="mt-auto">
                            <a href="{{ route('products.show', $product->id) }}" class="btn btn-info btn-sm">View Details</a>
                            
                            @if($product->quantity > 0)
                                <button class="btn btn-success btn-sm">Add to Cart</button>
                            @else
                                <button class="btn btn-secondary btn-sm" disabled>Out of Stock</button>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
