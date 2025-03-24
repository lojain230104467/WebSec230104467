@extends('layouts.master')

@section('content')
<div class="container mt-5">
    <h2>Add Question</h2>
    <form method="POST" action="{{ route('questions.store') }}">
        @csrf
        <div class="mb-3">
            <label class="form-label">Question</label>
            <input type="text" name="question" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Options (comma-separated)</label>
            <input type="text" name="options[]" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Correct Answer</label>
            <input type="text" name="correct_answer" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Add Question</button>
    </form>
</div>
@endsection
