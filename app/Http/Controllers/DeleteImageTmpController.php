<?php

namespace App\Http\Controllers;

use App\Models\Temporary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DeleteImageTmpController extends Controller
{
   public function store()
   {
      $temporaryImage = Temporary::where('folder', request()->getContent())->first();
      if($temporaryImage)
      {
         Storage::deleteDirectory('tmp/'. $temporaryImage->folder);
         $temporaryImage->delete();
      }
      return response()->noContent();
   }
}
