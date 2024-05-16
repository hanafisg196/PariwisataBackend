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


    public function createImage($tmpFile,$idFile)
    {
        foreach($tmpFile as $tmp)
        {
            $sourcePath = $tmp->file;
            $destinationPath = 'images/'. basename($sourcePath);
            Storage::copy($sourcePath, $destinationPath);
            Image::create([
                'destination_id' => $idFile,
                'image' => $destinationPath
            ]);
            Storage::delete($sourcePath);
            $tmp->delete();
        }
    }


    public function createDestination(Request $request)
    {
        $temporaryImage = Temporary::all();
        
        $validate = Validator::make($request->all(),
        [
            'title' => 'required|max:200',
            'daerah' => 'required|max:200',
            'cover' => 'required|mimes:png,jpg',
            'article' => 'required|max:1000',
            'location' => 'required|max:100',
            'trip_id' => 'required',
            'image.*' => 'required|mimes:png,jpg',
        ]);
        
     
        if($validate->fails()){
            foreach($temporaryImage as $tmp)
            {
                Storage::delete($tmp->file);
                    $tmp->delete();
            }
            return redirect('/destination/addform/')
            ->withErrors($validate)
            ->withInput();
        }
        $destination = Destination::create($validate->validated());
        $destinationId =  $destination->id;
        if($request->file('cover'))
        {
            $destination->cover = $request->file('cover')->store('images');
            $destination->save();
        }

        $this->createImage($temporaryImage,$destinationId);
        return redirect('destination')->with('success', 'Destination added successfully');
      
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