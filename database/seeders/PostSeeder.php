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

        $body = file_get_contents(__DIR__ . '/data/post.json');
        $summary = 'This is meaningless text meant to demonstrate an actual post summary for the blog layout.';

        for ($i = 1; $i <= 10; $i++) {
            $posts[] = [
                'category'      => "tech",
                'title'         => "Post $i",
                'slug'          => "post-$i",
                'summary'       => "This Post $i on Maseno Hub blog. $summary",
                'body'          => $body,
                'author_id'     => 1,
                'published_at'  => random_int(0, 10) < 7 ? $now : null,
                'created_at'    => $now,
                'updated_at'    => $now
            ];
        }

        DB::table('posts')->insert($posts);
    }
}
