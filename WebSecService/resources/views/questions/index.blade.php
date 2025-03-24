@extends('layouts.master')

@section('content')
<div class="container mt-5">
    <h2>Questions List</h2>
    <a href="{{ route('questions.create') }}" class="btn btn-primary mb-3">Add New Question</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>Question</th>
                <th>Options</th>
                <th>Correct Answer</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($questions as $question)
            <tr>
                <td>{{ $question->question }}</td>
                <td>
                    @foreach(json_decode($question->options) as $option)
                        {{ $option }}<br>
                    @endforeach
                </td>
                <td>{{ $question->correct_answer }}</td>
                <td>
                    <a href="{{ route('questions.edit', $question->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('questions.destroy', $question->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?');">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
