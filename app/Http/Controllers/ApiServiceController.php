<?php

namespace App\Http\Controllers;

use App\Models\Destination;
use App\Models\Trip;
use Illuminate\Http\Request;

class ApiServiceController extends Controller
{

    public function tripSlide()
    {
        $trips = Trip::inRandomOrder()->limit(5)->withCount('destinations')->get();
        return response()->json([
            'data' => $trips
        ]);
    }

    public function destinationList(Request $request)
    {

        $page = intval($request->query->get('page', 1));
        $perPage = intval($request->query->get('perPage', 5));
        $destinations = Destination::latest()
            ->paginate($perPage, ['*'], 'page', $page);
        return response()->json([
            'data' => $destinations->items(),
            [
                'total' => $destinations->total(),
                'perPage' => $destinations->perPage(),
                'currentPage' => $destinations->currentPage(),
                'lastPage' => $destinations->lastPage()
            ]
        ]);
    }

    public function tripDetail(Request $request, int $id)
    {
        $page = intval($request->query->get('page', 1));
        $perPage = intval($request->query->get('perPage', 5));

        $destinations = Destination::where('trip_id', $id)
        ->latest()->paginate($perPage, ['*'], 'page', $page);

        return response()->json([
            'data' => $destinations->items(),
            [
                'total' => $destinations->total(),
                'perPage' => $destinations->perPage(),
                'currentPage' => $destinations->currentPage(),
                'lastPage' => $destinations->lastPage(),

            ]
        ]);
    }


    public function trips(Request $request)
    {

        $page = intval($request->query->get('page', 1));
        $perPage = intval($request->query->get('perPage', 5));

        $trips = Trip::latest()->withCount('destinations')
            ->paginate($perPage, ['*'], 'page', $page);
        return response()->json([
            'data' => $trips->items(),
            [
                'total' => $trips->total(),
                'perPage' => $trips->perPage(),
                'currentPage' => $trips->currentPage(),
                'lastPage' => $trips->lastPage()
            ]
        ]);
    }

    public function destination(int $id)
    {
        $destination = Destination::where('id', $id)->with('images')->first();
        return response()->json([
            'data' => $destination
        ]);
    }

    public function trip(int $id)
    {
        $trip = Trip::where('id', $id)->withCount('destinations')->first();

        return response()->json(['data' => $trip]);
    }

    public function search(Request $request)
    {

        $page = intval($request->query->get('page', 1));
        $perPage = intval($request->query->get('perPage', 5));

        $destinations = Destination::when($request->has('search'), function ($query) use ($request) {
            $query->where('title', 'LIKE', '%' . $request->search . '%');
        })->latest()->paginate($perPage, ['*'], 'page', $page);

        return response()->json([
            'data' => $destinations->items(),
            [
                'total' => $destinations->total(),
                'perPage' => $destinations->perPage(),
                'currentPage' => $destinations->currentPage(),
                'lastPage' => $destinations->lastPage()
            ]
        ]);
    }

    public function recomendDestination()
    {
        $destinations = Destination::inRandomOrder()->limit(10)->get();
        return response()->json([
            'data' => $destinations
        ]);
    }
}
