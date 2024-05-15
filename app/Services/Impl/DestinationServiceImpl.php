<?php

namespace App\Services\Impl;

use App\Models\Destination;
use App\Models\Image;
use App\Models\Trip;
use App\Services\DestinationService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DestinationServiceImpl implements DestinationService
{

    public function getDestination()
    {
        return Destination::paginate(10);
    }


    public function createDestination(Request $request)
    {
        $validate = $request->validate([
            'title' => 'required|max:200',
            'daerah' => 'required|max:200',
            'cover' => 'required|mimes:png,jpg',
            'article' => 'required|max:1000',
            'location' => 'required|max:100',
            'trip_id' => 'required',
            'image.*' => 'required|mimes:png,jpg',
        ]);
        
        $destination = new Destination;
        $destination->title = $validate['title'];
        $destination->daerah = $validate['daerah'];
        $destination->article = $validate['article'];
        $destination->location = $validate['location'];
        $destination->trip_id = $validate['trip_id'];
    
        if($request->file('cover'))
        {
            $destination->cover = $request->file('cover')->store('images');
        }
        $destination->save();
    
        
        if($request->file('image')){

            foreach ($request->file('image') as $imageFile) {
                $imagePath =  $imageFile->store('images');
                $image = new Image;
                $image->image = $imagePath;
                $image->destination_id = $destination->id;
                $image->save();
            }
          
        }
    }
    
    public function updateDestination()
    {

    }


    public function DeleteDestination($id)
    {
        $destinaton = Destination::find($id);
     
        if($destinaton->cover)
        {
            Storage::delete($destinaton->cover);
        }
        $images = Image::where('destination_id', $id)->get();
        foreach ($images as $image) {
            Storage::delete($image->image);
            $image->delete();
        }

        $destinaton->destroy($id);
       
    }

    public function getTrip(){
        return Trip::all();
    }
}