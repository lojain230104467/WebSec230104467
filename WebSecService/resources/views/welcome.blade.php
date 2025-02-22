@extends('layouts.master')

@section('title', 'Home')

@section('content')
    <div class="card m-4">
        <div class="card-body">
            <button type="button" class="btn btn-primary" onclick="doSomething()">Press Me</button>
        </div>
    </div>

    <script>
        function doSomething() {
            alert("Hello from JavaScript!");
        }
    </script>
@endsection
