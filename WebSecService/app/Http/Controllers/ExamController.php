<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;

class ExamController extends Controller
{
    // Show the exam start page
    public function start()
    {
        $questions = Question::all(); // Fetch all questions from DB
        return view('exam.start', compact('questions'));
    }

    // Process submitted answers and calculate score
    public function submitExam(Request $request)
    {
        // Ensure answers are provided
        if (!$request->has('answers') || !is_array($request->answers)) {
            return back()->with('error', 'No answers were submitted.');
        }

        $score = 0;
        $totalQuestions = count($request->answers); // Prevent count() error

        foreach ($request->answers as $questionId => $answer) {
            $question = Question::find($questionId);
            if ($question && $question->correct_answer == $answer) {
                $score++;
            }
        }

        return view('exam.result', compact('score', 'totalQuestions'));
    }
}
