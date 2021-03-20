<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Spatie\CalendarLinks\Link;

class EventController extends Controller
{
    public function index()
    {
        return view('events.index', [
            'events' => Event::with(['organizer'])->get()
        ]);
    }

    public function show($eventId)
    {
        $event = Event::with(['organizer'])->find($eventId);

        return view('events.show', [
            'event' => $event,
            'link'  => Link::create($event->title, $event->start, $event->end)
                ->address($event->venue)
                ->description($event->description)
        ]);
    }
}
