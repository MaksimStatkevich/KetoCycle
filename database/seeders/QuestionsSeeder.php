<?php

namespace Database\Seeders;

use App\Models\Question;
use Illuminate\Database\Seeder;

class QuestionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $insertMany = Question::create(['question_text' => 'Text question 1']);
        $insertMany->answers()->createMany([
            ['text_answer' => 'Answer 1'],
            ['text_answer' => 'Answer 2'],
            ['text_answer' => 'Answer 3'],
            ['text_answer' => 'Answer 4'],
            ['text_answer' => 'Answer 5'],
        ]);

        $insertMany = Question::create(['question_text' => 'Text question 2']);
        $insertMany->answers()->createMany([
            ['text_answer' => 'Answer 6'],
            ['text_answer' => 'Answer 7'],
            ['text_answer' => 'Answer 8'],
            ['text_answer' => 'Answer 9'],
            ['text_answer' => 'Answer 10'],
        ]);

        $insertMany = Question::create(['question_text' => 'Text question 3']);
        $insertMany->answers()->createMany([
            ['text_answer' => 'Answer 11'],
            ['text_answer' => 'Answer 12'],
            ['text_answer' => 'Answer 13'],
            ['text_answer' => 'Answer 14'],
            ['text_answer' => 'Answer 15'],
        ]);

    }
}
