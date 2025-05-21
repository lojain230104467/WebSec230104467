@extends('layouts.master')
@section('title', 'Products')
@section('content')
<div class="row mt-2">
    <div class="col col-6">
        <h1>Products</h1>
    </div>
    <div class="col col-2">
        @can('add_products')
        <a href="{{route('products_edit')}}" class="btn btn-success form-control">Add Product</a>
        @endcan
    </div>
    <div class="col col-2">
        @can('manage_inventory')
        <a href="{{route('products_manage_inventory')}}" class="btn btn-warning form-control">Manage Stock</a>
        @endcan
    </div>
    <div class="col col-2">
        @auth
            @if(auth()->user()->hasPermissionTo('view_purchases'))
            <a href="{{route('purchases')}}" class="btn btn-info form-control">My Purchases</a>
            @endif
        @endauth
    </div>
</div>

@auth
    @if(auth()->user()->hasRole('Customer'))
    <div class="alert alert-info d-flex justify-content-between align-items-center">
        <div>
            <strong>Your Credit Balance:</strong> ${{ number_format(auth()->user()->credit, 2) }}
        </div>
        @if(auth()->user()->hasPermissionTo('view_purchases'))
        <div>
            <a href="{{route('purchases')}}" class="btn btn-outline-info">View Purchase History</a>
        </div>
        @endif
    </div>
    @endif
@endauth

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

<form>
    <div class="row">
        <div class="col col-sm-2">
            <input name="keywords" type="text" class="form-control" placeholder="Search Keywords" value="{{ request()->keywords }}" />
        </div>
        <div class="col col-sm-2">
            <input name="min_price" type="numeric" class="form-control" placeholder="Min Price" value="{{ request()->min_price }}"/>
        </div>
        <div class="col col-sm-2">
            <input name="max_price" type="numeric" class="form-control" placeholder="Max Price" value="{{ request()->max_price }}"/>
        </div>
        <div class="col col-sm-2">
            <select name="order_by" class="form-select">
                <option value="" {{ request()->order_by==""?"selected":"" }} disabled>Order By</option>
                <option value="name" {{ request()->order_by=="name"?"selected":"" }}>Name</option>
                <option value="price" {{ request()->order_by=="price"?"selected":"" }}>Price</option>
            </select>
        </div>
        <div class="col col-sm-2">
            <select name="order_direction" class="form-select">
                <option value="" {{ request()->order_direction==""?"selected":"" }} disabled>Order Direction</option>
                <option value="ASC" {{ request()->order_direction=="ASC"?"selected":"" }}>ASC</option>
                <option value="DESC" {{ request()->order_direction=="DESC"?"selected":"" }}>DESC</option>
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

@foreach($products as $product)
<div class="card mt-2">
    <div class="card-body">
        <div class="row">
            <div class="col col-sm-12 col-lg-4">
                <img src="{{asset("images/$product->photo")}}" class="img-thumbnail" alt="{{$product->name}}" width="100%">
            </div>
            <div class="col col-sm-12 col-lg-8 mt-3">
                <div class="row mb-2">
                    <div class="col-8">
                        <h3>{{$product->name}}</h3>
                    </div>
                    <div class="col col-2">
                        @can('edit_products')
                        <a href="{{route('products_edit', $product->id)}}" class="btn btn-success form-control">Edit</a>
                        @endcan
                    </div>
                    <div class="col col-2">
                        @can('delete_products')
                        <a href="{{route('products_delete', $product->id)}}" class="btn btn-danger form-control">Delete</a>
                        @endcan
                    </div>
                </div>

                <table class="table table-striped">
                    <tr><th width="20%">Name</th><td>{{$product->name}}</td></tr>
                    <tr><th>Model</th><td>{{$product->model}}</td></tr>
                    <tr><th>Code</th><td>{{$product->code}}</td></tr>
                    <tr><th>Price</th><td>${{number_format($product->price, 2)}}</td></tr>
                    <tr><th>Stock</th><td>{{$product->stock_quantity}} items</td></tr>
                    <tr><th>Description</th><td>{{$product->description}}</td></tr>
                    @if($product->review)
                    <tr><th>Review</th><td>{{$product->review}}</td></tr>
                    @endif
                </table>

                <div class="row">
                    <div class="col">
                        @auth
                            @if(auth()->user()->hasPermissionTo('buy_products'))
                                @if($product->isInStock())
                                    <form action="{{ route('products_buy', $product->id) }}" method="POST" style="display: inline;">
                                        @csrf
                                        <button type="submit" class="btn btn-primary">Buy Now</button>
                                    </form>
                                @else
                                    <button class="btn btn-secondary" disabled>Out of Stock</button>
                                @endif
                            @endif

                            @if(auth()->user()->hasPermissionTo('add_review'))
                                <a href="{{route('products_review', $product->id)}}" class="btn btn-info">Review</a>
                            @endif

                            <form action="{{route('products_toggle_favorite', $product->id)}}" method="POST" style="display: inline;">
                                @csrf
                                <button type="submit" class="btn {{$product->isFavoritedBy(auth()->user()) ? 'btn-danger' : 'btn-outline-danger'}}">
                                    {{$product->isFavoritedBy(auth()->user()) ? 'Remove from Favorites' : 'Add to Favorites'}}
                                </button>
                            </form>
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach
@endsection