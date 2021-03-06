<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
        return view('events.index', [
            'events' => Event::with(['organizer'])->get()
        ]);
    }

    public function show($event)
    {
        return view('events.show', [
            'event' => Event::with(['organizer'])->find($event)
        ]);
    }
}
