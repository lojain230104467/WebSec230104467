<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Question;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Question::create([
            'question' => 'What is the capital of France?',
            'options' => json_encode(['Paris', 'London', 'Rome', 'Berlin']),
            'correct_answer' => 0, // Index of the correct answer (Paris)
        ]);

        Question::create([
            'question' => 'Which planet is known as the Red Planet?',
            'options' => json_encode(['Earth', 'Venus', 'Mars', 'Jupiter']),
            'correct_answer' => 2, // Mars
        ]);

        Question::create([
            'question' => 'What is 2 + 2?',
            'options' => json_encode(['3', '4', '5', '6']),
            'correct_answer' => 1, // 4
        ]);
    }
}
