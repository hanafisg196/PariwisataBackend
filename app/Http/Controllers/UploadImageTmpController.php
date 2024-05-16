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
            $fileName = uniqid() . '.' . $image->getClientOriginalExtension();
            $file = $image->storeAs('images/tmp/'. $fileName);
    
            Temporary::create([
                'file' => $file
            ]);
    
            return $file;
        }
    
        return '';
    }
    

}
