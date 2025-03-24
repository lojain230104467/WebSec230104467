@extends('layouts.master')

@section('content')
<div class="container mt-5">
    <h2>Add New Question</h2>
    <form method="POST" action="{{ route('questions.store') }}">
        @csrf
        <div class="mb-3">
            <label>Question</label>
            <input type="text" name="question" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Options (separated by commas)</label>
            <input type="text" name="options" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Correct Answer</label>
            <input type="text" name="correct_answer" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Save Question</button>
    </form>
</div>
@endsection
