<?php

namespace App\Http\Controllers;

use App\Models\Trip;
use Illuminate\Http\Request;

class ApiServiceController extends Controller
{
    
    public function tripSlide()
    {
        $trips = Trip::limit(5)->get();
        return response()->json([
            'data' => $trips
        ]);
    }
}
