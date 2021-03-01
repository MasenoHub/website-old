<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $posts = [];
        $now = now();

        $body = str_repeat(str_repeat("The quick brown fox jumped over the lazy dog.", 7) . "\n", 7);

        for ($i = 0; $i < 10; $i++) {
            $posts[] = [
                'title'         => "Post $i",
                'slug'          => "post-$i",
                'summary'       => "Post $i on Maseno Hub blog.",
                'body'          => $body,
                'author_id'     => 1,
                'created_at'    => $now,
                'updated_at'    => $now
            ];
        }

        DB::table('posts')->insert($posts);
    }
}
