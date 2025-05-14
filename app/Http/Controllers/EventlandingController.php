<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class EventlandingController extends Controller
{
    public function index()
    {
        $events = Event::select('title', 'start_time as start', 'end_time as end', 'description', 'poster_image')
                       ->where('end_time', '>=', now())  // hanya event yang belum lewat
                       ->orderBy('start_time')
                       ->get();

        return view('landing.events', compact('events'));
    }
}