<?php

namespace App\Http\Controllers;

use App\Models\Temporary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DeleteImageTmpController extends Controller
{
   public function refert()
   {
      $fileTmp = Temporary::where('file', request()->getContent())->first();
      if ($fileTmp) {
          Storage::delete($fileTmp->file);
          $fileTmp->delete();
      }
      return response()->noContent();
   }
   
      
   
}
