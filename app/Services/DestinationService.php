<?php

namespace App\Services;

use Illuminate\Http\Request;

interface DestinationService
{
    public function createDestination(Request $request);
    public function updateDestination();
    public function deleteDestination($id);
    public function getTrip();
    public function getDestination();

}