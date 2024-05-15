<?php

namespace App\Services\Impl;

use App\Models\Trip;
use App\Services\TripService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TripServiceImpl implements TripService {

    public function getTrip()
    {
         return Trip::orderBy('id', 'desc')->paginate(10);
    }
    public function getTripById($id)
    {
            return  Trip::find($id);
    }
    public function createTrip(Request $request)
    {
        $trip = new Trip;
        $validate = $request->validate([
                'name' => 'required', 'max:100',
                'cover' => 'required', 'mimes:png,jpg'
        ]);

        if($request->file('cover'))
        {
            $validate['cover'] = $request->file('cover')->store('images');
        }
        
        $trip->create($validate);
    }

    public function updateTrip(Request $request,$id)
    {
        $trip = Trip::find($id);
        $validate = $request->validate([
            'name' =>'required','max:100',
            'cover' =>'mimes:png,jpg'
    
        ]);

        if($request->hasFile('cover') && $request->file('cover')->isValid())
        {
            if ($trip->cover)
            {
                Storage::delete($trip->cover);
            }

            $validate['cover'] = $request->file('cover')->store('images');
        }
        $trip->update($validate);
    }

    public function deleteTrip($id)
    {
        $trip = Trip::find($id);
        if($trip->cover)
        {
            Storage::delete($trip->cover);
        }

        $trip->destroy($id);
    }

  
}
    