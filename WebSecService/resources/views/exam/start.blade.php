@extends('layouts.master')

@section('content')
<div class="container mt-5">
    <h2>Start Exam</h2>
    <form method="POST" action="{{ route('exam.submit') }}">
        @csrf
        @foreach($questions as $question)
        <div class="mb-3">
            <p><strong>{{ $question->question }}</strong></p>
            @foreach(json_decode($question->options) as $option)
            <div>
                <input type="radio" name="answers[{{ $question->id }}]" value="{{ $option }}" required>
                <label>{{ $option }}</label>
            </div>
            @endforeach
        </div>
        @endforeach
        <button type="submit" class="btn btn-success">Submit Exam</button>
    </form>
</div>
@endsection
