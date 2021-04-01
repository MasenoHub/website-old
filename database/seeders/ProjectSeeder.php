<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $projects = [];
        $now = now();

        for ($i = 1; $i <= 10; $i++) {
            $projects[] = [
                'title'         => "Project $i",
                'url'           => "https://github.com/masenohub",
                'description'   => "Project $i by Maseno Hub organization.",
                'lead_id'       => 1,
                'created_at'    => $now,
                'updated_at'    => $now
            ];
        }

        DB::table('projects')->insert($projects);
    }
}
