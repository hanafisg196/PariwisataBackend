<?php

namespace App\Livewire;

use App\Models\Image;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class DeleteImage extends Component
{
    public $images;
    public $id;

    public function mount($id)
    {
        $this->images = Image::where('destination_id', $id)->get();
    }

    public function render()
    {
        return view('livewire.delete-image');
    }

    public function deleteImage($imageId)
    {
        $image = Image::find($imageId);
        if ($image) {
            $image->delete();
            Storage::delete($image->image);
            session()->flash('success', 'Image deleted successfully.');
            $this->images = Image::where('destination_id', $this->id)->get();
        } else {
            session()->flash('error', 'Failed to delete image.');
        }
    }

    
}
