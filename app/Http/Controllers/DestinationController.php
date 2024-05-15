<?php

namespace App\Http\Controllers;

use App\Services\DestinationService;
use Illuminate\Http\Request;

class DestinationController extends Controller
{
    private DestinationService $destinationService;

    public function __construct(DestinationService $destinationService)
    {
        $this->destinationService = $destinationService;
    }

    public function index()
    {
        $data = $this->destinationService->getDestination();
        return view('dashboard.destination')->with('data', $data);
    }
    public function addView()
    {
        $trip = $this->destinationService->getTrip();
        return view('dashboard.destinationadd')->with(
            [
                'trip' => $trip
            ]
        );
    }
    public function create(Request $request)
    {
        $this->destinationService->createDestination($request);
        return redirect('destination')->with('success', 'Destination added successfully');
    }
    public function delete($id)
    {
        $this->destinationService->deleteDestination($id);
        return redirect()->back()->with('success', 'Trip added successfully');
    }
}
