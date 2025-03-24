@extends('layouts.master')

@section('content')
<div class="container mt-5">
    <h2>Edit Question</h2>
    <form method="POST" action="{{ route('questions.update', $question->id) }}">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label>Question</label>
            <input type="text" name="question" class="form-control" value="{{ $question->question }}" required>
        </div>
        <div class="mb-3">
            <label>Options (separated by commas)</label>
            <input type="text" name="options" class="form-control" value="{{ implode(',', json_decode($question->options)) }}" required>
        </div>
        <div class="mb-3">
            <label>Correct Answer</label>
            <input type="text" name="correct_answer" class="form-control" value="{{ $question->correct_answer }}" required>
        </div>
        <button type="submit" class="btn btn-success">Update Question</button>
    </form>
</div>
@endsection
