<?php

namespace App\Http\Controllers;

use App\Services\TripService;
use Illuminate\Http\Client\Request as ClientRequest;
use Illuminate\Http\Request;

class TripController extends Controller
{
    private TripService $tripService;

    public function __construct(TripService $tripService)
    {
        $this->tripService = $tripService;
    }

    public function index()
    {
        $data = $this->tripService->getTrip();

        return view('dashboard.trip')->with([
                'data' => $data
        ]);
    }
    public function add(Request $request)
    {
        $this->tripService->createTrip($request);
        return redirect()->back()->with('success', 'Trip added successfully');
    }

    public function update(Request $request, $id)
    {
        $this->tripService->updateTrip($request, $id);
        return redirect()->back()->with('success', 'Trip added successfully');
    }
    public function delete($id)
    {
        $this->tripService->deleteTrip($id);
        return redirect()->back()->with('success', 'Trip deleted successfully');
    }

    public function search(Request $request)
    {

        $data = $this->tripService->searchTrip($request);
        return view('dashboard.trip')->with([
            'data' => $data
        ]);
    }
}
