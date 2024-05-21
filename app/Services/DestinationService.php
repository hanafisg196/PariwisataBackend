<?php

namespace App\Services;

use Illuminate\Http\Request;

interface DestinationService
{
    public function createDestination(Request $request);
    public function updateDestination(Request $request, $id);
    public function deleteDestination($id);
    public function getTrip();
    public function getDestination();
    public function getDestinationByid($id);
    public function searchDestination(Request $request);
    public function mapLink($id);

}
