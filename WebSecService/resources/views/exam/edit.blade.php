@extends('layouts.master')

@section('content')
<div class="container mt-5">
    <h2 class="text-center mb-4">Edit Question</h2>
    
    <form action="{{ route('questions.update', $question->id) }}" method="POST">
        @csrf
        @method('PUT') <!-- Laravel uses PUT for updating -->
        
        <div class="mb-3">
            <label for="question" class="form-label">Question:</label>
            <input type="text" name="question" id="question" class="form-control" value="{{ $question->question }}" required>
        </div>

        <div class="mb-3">
            <label for="option1" class="form-label">Option 1:</label>
            <input type="text" name="options[]" class="form-control" value="{{ $question->options[0] }}" required>
        </div>

        <div class="mb-3">
            <label for="option2" class="form-label">Option 2:</label>
            <input type="text" name="options[]" class="form-control" value="{{ $question->options[1] }}" required>
        </div>

        <div class="mb-3">
            <label for="option3" class="form-label">Option 3:</label>
            <input type="text" name="options[]" class="form-control" value="{{ $question->options[2] }}" required>
        </div>

        <div class="mb-3">
            <label for="option4" class="form-label">Option 4:</label>
            <input type="text" name="options[]" class="form-control" value="{{ $question->options[3] }}" required>
        </div>

        <div class="mb-3">
            <label for="correct_answer" class="form-label">Correct Answer:</label>
            <select name="correct_answer" id="correct_answer" class="form-select" required>
                @foreach($question->options as $index => $option)
                    <option value="{{ $index }}" {{ $index == $question->correct_answer ? 'selected' : '' }}>
                        {{ $option }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Update Question</button>
    </form>
</div>
@endsection
