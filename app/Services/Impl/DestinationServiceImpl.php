<?php

namespace App\Services\Impl;

use App\Models\Destination;
use App\Models\Image;
use App\Models\Temporary;
use App\Models\Trip;
use App\Services\DestinationService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;


class DestinationServiceImpl implements DestinationService
{

    public function getDestination()
    {
        return Destination::paginate(10);
    }


    public function createDestination(Request $request)
    {
        
        $validate = Validator::make($request->all(),[
            'title' => 'required|max:200',
            'daerah' => 'required|max:200',
            'cover' => 'required|mimes:png,jpg',
            'article' => 'required|max:1000',
            'location' => 'required|max:100',
            'trip_id' => 'required',
            'image.*' => 'required|mimes:png,jpg',
        ]);
        
        $temporaryImage = Temporary::all();

        if($validate->fails()){
            foreach($temporaryImage as $tmp)
            {
                Storage::deleteDirectory('images/tmp/'. $tmp->follder);
                $tmp->delete();
            }
            return redirect()->back()->withErrors($validate)->withInput();
        }
        $destination = Destination::create($validate->validated());
        if($request->file('cover'))
        {
            $destination->cover = $request->file('cover')->store('images');
        }
        foreach($temporaryImage as $tmp)
        {
            Storage::copy('images/tmp/'. $tmp->folder . '/' . $tmp->filename, 'images/' . $tmp->folder . '/' . $tmp->filename);
            $path = $tmp->folder . '/' . $tmp->filename;
            Image::create([
                'destination_id' => $destination->id,
                'image' => $tmp->filename = $path
            ]);
            Storage::deleteDirectory('images/tmp/'. $tmp->follder);
            $tmp->delete();
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