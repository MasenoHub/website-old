<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AnswerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $answers = [];
        $now = now();

        for ($i = 0; $i < 100; $i++) {
            $question = floor($i / 10);
            $questionAnswer = ($i - ($question * 10)) + 1;
            $question++;

            $answers[] = [
                'text'          => "Answer #$questionAnswer to question #$question.",
                'author_id'     => 1,
                'question_id'   => $question,
                'created_at'    => $now,
                'updated_at'    => $now
            ];
        }

        DB::table('answers')->insert($answers);
    }
}
