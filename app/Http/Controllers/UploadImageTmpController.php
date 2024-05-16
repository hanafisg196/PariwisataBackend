<?php

namespace App\Http\Controllers;

use App\Models\Temporary;
use Illuminate\Http\Request;

class UploadImageTmpController extends Controller
{
    public function store(Request $request)
    {
        
        if ($request->hasFile('image')) {
               $image = $request->file('image');
               $fileName = $image->getClientOriginalName();
               $folder = uniqid('image-', true);
               $image->storeAs('images/tmp/' .$folder, $fileName);
                
               Temporary::create([
                'folder' => $folder,
                'filename'=> $fileName
               ]);
               
               return $folder;
           
        }
        return '';
    }
    

}
