<?php

namespace App\Http\Controllers;

use App\Services\DashboardService;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    private DashboardService $dashboardService;

    public function __construct(DashboardService $dashboardService)
    {
        $this->dashboardService = $dashboardService;
    }
    public function index()
    {
        $trip = $this->dashboardService->getTrip();
        $destination = $this->dashboardService->getDestination();
        return view('dashboard.dashboard')->with([
            'trip'=> $trip,
            'destination'=> $destination
        ]);

    }
}
