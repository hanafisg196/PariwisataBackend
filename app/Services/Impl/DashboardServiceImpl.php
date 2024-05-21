<?php

namespace App\Services\Impl;

use App\Models\Destination;
use App\Models\Trip;
use App\Services\DashboardService;

class DashboardServiceImpl implements DashboardService
{
    public function getTrip(){
            return Trip::count();
    }
    public function getDestination()
    {
        return Destination::count();
    }

}
