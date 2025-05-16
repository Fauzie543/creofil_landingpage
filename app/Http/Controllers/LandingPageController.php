<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use App\Models\Feedback;
use App\Models\Event;
use App\Models\Poster;
use App\Models\LandingContent;
use App\Models\Menu;
use App\Models\Category;

class LandingPageController extends Controller
{
    public function linktree() {
        return view('landing.index');
    }
    
    public function index() {
        $events = Event::select('title', 'start_time as start', 'end_time as end', 'poster_image')->orderBy('start_time')->get();
        $posters = Poster::select('photo', 'status')->get();
        $landingContents = LandingContent::all();
        return view('landing.dashboard', compact('events', 'posters', 'landingContents'));
    }
        
    public function about()
{
    return view('landing.about');
}

public function location()
{
    return view('landing.location');
}

public function contact()
{
    return view('landing.contact');
}
public function menu(Request $request)
{
    $query = Menu::with('category')->where('status', true);

    if ($request->filled('category')) {
        $query->where('category_id', $request->category);
    }

    $menus = $query->get();
    $categories = Category::all();

    return view('landing.menu', compact('menus', 'categories'));
}

public function event()
{
    $events = Event::orderBy('start_time')->paginate(10);

    $nextEvent = Event::where('start_time', '>', now())
        ->orderBy('start_time')
        ->first();

    return view('landing.events', compact('events', 'nextEvent'));
}

public function eventPage()
{
    $nextEvent = Event::where('start_time', '>', now())->orderBy('start_time')->first();
    $events = Event::where('start_time', '>', now())
                   ->where('id', '!=', optional($nextEvent)->id) // biar nextEvent ga keulang
                   ->orderBy('start_time')
                   ->get();

    return view('landing.event', compact('nextEvent', 'events'));
}

public function show($slug)
{
    $event = Event::where('slug', $slug)->firstOrFail();

    return view('landing.event-detail', compact('event'));
}

public function feedback(Request $request)
{
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'nullable|email|max:255',
        'message' => 'required|string',
    ]);

    Feedback::create([
        'name' => $validated['name'],
        'email' => $validated['email'] ?? null,
        'message' => $validated['message'],
        'status' => 'new',
    ]);

    return redirect()->back()->with('success', 'Thank you for your feedback!');
}
    
}