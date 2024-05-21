<?php

namespace App\Http\Controllers;

use App\Models\Destination;
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
    public function updateView($id)
    {

        $destination = $this->destinationService->getDestinationByid($id);
        $trip = $this->destinationService->getTrip();
        return view('dashboard.destinationupdate')->with(
            [
                'destination' => $destination,
                'trip' => $trip,
            ]
        );
    }

    public function updateDestination(Request $request, $id)
    {
        $this->destinationService->updateDestination($request,$id);
        return redirect()->back()->with('success', 'image update successfully');
    }

    public function create(Request $request)
    {
        $this->destinationService->createDestination($request);
        return redirect('/destination/addform/');
    }
    public function delete($id)
    {
        $this->destinationService->deleteDestination($id);
        return redirect()->back()->with('success', 'Destination delete successfully');
    }

    public function search(Request $request)
    {
        $data = $this->destinationService->searchDestination($request);
        return view('dashboard.destination')->with([
            'data' => $data
        ]);
    }

    public function showMapLink($id)
    {

        return $this->destinationService->mapLink($id);

    }
}
