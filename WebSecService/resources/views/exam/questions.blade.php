@extends('layouts.master')

@section('content')
<div class="container mt-5">
    <h2>Questions</h2>
    <a href="{{ route('questions.create') }}" class="btn btn-primary mb-3">Add Question</a>
    <table class="table table-bordered">
        <tr>
            <th>Question</th>
            <th>Options</th>
            <th>Correct Answer</th>
            <th>Actions</th>
        </tr>
        @foreach($questions as $question)
        <tr>
            <td>{{ $question->question }}</td>
            <td>{{ implode(', ', json_decode($question->options)) }}</td>
            <td>{{ $question->correct_answer }}</td>
            <td>
                <a href="{{ route('questions.edit', $question->id) }}" class="btn btn-warning">Edit</a>
                <form action="{{ route('questions.destroy', $question->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</div>
@endsection
