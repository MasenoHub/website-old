<?php

namespace Database\Seeders;

use Carbon\CarbonImmutable;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $events = [];
        $now = now();

        for ($i = 1; $i <= 10; $i++) {
            $start = CarbonImmutable::createFromDate(month: $i);

            $events[] = [
                'title'         => "Event $i",
                'description'   => "Event $i starts on $start",
                'venue'         => "The usual place",
                'start'         => $start,
                'end'           => $start->addHours(4),
                'organizer_id'  => 1,
                'created_at'    => $now,
                'updated_at'    => $now
            ];
        }

        DB::table('events')->insert($events);
    }
}
