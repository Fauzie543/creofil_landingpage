<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Menu;
use App\Models\Feedback;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $totalEvents = Event::count();
        $totalMenus = Menu::count();
        $totalFeedbacks = Feedback::count();
        $totalVisitors = DB::table('page_visits')->count();

        // Hitung data per bulan (bulan ini)
        $currentMonth = Carbon::now()->month;
        $currentYear = Carbon::now()->year;

        $eventsThisMonth = Event::whereYear('created_at', $currentYear)
                                ->whereMonth('created_at', $currentMonth)
                                ->count();
                                
        $menusThisMonth = Menu::whereYear('created_at', $currentYear)
                                ->whereMonth('created_at', $currentMonth)
                                ->count();

        $feedbacksThisMonth = Feedback::whereYear('created_at', $currentYear)
                                      ->whereMonth('created_at', $currentMonth)
                                      ->count();

        $visitorsThisMonth = DB::table('page_visits')
                               ->whereYear('created_at', $currentYear)
                               ->whereMonth('created_at', $currentMonth)
                               ->count();

        return view('admin.dashboard', compact(
            'totalEvents', 'totalMenus', 'totalFeedbacks', 'totalVisitors',
            'eventsThisMonth', 'menusThisMonth', 'feedbacksThisMonth', 'visitorsThisMonth'
        ));
        
    }
}