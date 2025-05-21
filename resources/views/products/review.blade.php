@extends('layouts.master')
@section('title', 'Add Review')
@section('content')
<div class="row mt-2">
    <div class="col col-10">
        <h1>Add Review for {{$product->name}}</h1>
    </div>
</div>

<form action="{{route('products_save_review', $product->id)}}" method="post">
    {{ csrf_field() }}
    @foreach($errors->all() as $error)
    <div class="alert alert-danger">
        <strong>Error!</strong> {{$error}}
    </div>
    @endforeach

    <div class="row mb-2">
        <div class="col">
            <label for="review" class="form-label">Your Review:</label>
            <textarea class="form-control" name="review" rows="5" required>{{ old('review') }}</textarea>
        </div>
    </div>

    <div class="row mb-2">
        <div class="col">
            <button type="submit" class="btn btn-primary">Submit Review</button>
            <a href="{{route('products_list')}}" class="btn btn-secondary">Cancel</a>
        </div>
    </div>
</form>
@endsection 