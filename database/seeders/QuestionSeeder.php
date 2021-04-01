<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $questions = [];
        $now = now();

        $body = file_get_contents(__DIR__ . '/data/question.json');

        for ($i = 1; $i <= 10; $i++) {
            $questions[] = [
                'category'      => random_int(0, 10) > 5 ? 'programming' : 'tech support',
                'title'         => "Question $i",
                'slug'          => "question-$i",
                'body'          => $body,
                'author_id'     => 1,
                'created_at'    => $now,
                'updated_at'    => $now
            ];
        }

        DB::table('questions')->insert($questions);
    }
}
