<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function show()
    {
        return view('events', [
            'events' => Event::with(['organizer'])->get()
        ]);
    }
}
