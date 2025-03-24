<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;

class QuestionController extends Controller
{
    // Display all questions
    public function index()
    {
        $questions = Question::all();
        return view('questions.index', compact('questions'));
    }

    // Show form to create a new question
    public function create()
    {
        return view('questions.create');
    }

    // Store new question
    public function store(Request $request)
    {
        $validated = $request->validate([
            'question' => 'required|string|max:255',
            'options' => 'required|array|min:4',
            'correct_answer' => 'required|integer|min:0|max:3',
        ]);

        Question::create([
            'question' => $validated['question'],
            'options' => json_encode($validated['options']), // Store options as JSON
            'correct_answer' => $validated['correct_answer'],
        ]);

        return redirect()->route('questions.index')->with('success', 'Question added successfully.');
    }

    // Show form to edit a question
    public function edit(Question $question)
    {
        // Decode options to display them correctly in the form
        $question->options = json_decode($question->options, true);
        return view('questions.edit', compact('question'));
    }

    // Update question
    public function update(Request $request, Question $question)
    {
        $validated = $request->validate([
            'question' => 'required|string|max:255',
            'options' => 'required|array|min:4',
            'correct_answer' => 'required|integer|min:0|max:3',
        ]);

        $question->update([
            'question' => $validated['question'],
            'options' => json_encode($validated['options']), // Ensure options are saved as JSON
            'correct_answer' => $validated['correct_answer'],
        ]);

        return redirect()->route('questions.index')->with('success', 'Question updated successfully.');
    }

    // Delete a question
    public function destroy(Question $question)
    {
        $question->delete();
        return redirect()->route('questions.index')->with('success', 'Question deleted successfully.');
    }
}
