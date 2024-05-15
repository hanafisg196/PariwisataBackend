<?php
namespace App\Services;

use Illuminate\Http\Request;

interface TripService {

    public function getTrip();
    public function getTripById($id);
    public function createTrip(Request $request);
    public function updateTrip(Request $request,$id);
    public function deleteTrip($id);

}