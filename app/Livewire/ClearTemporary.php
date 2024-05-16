<?php

namespace App\Livewire;

use App\Models\Temporary;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class ClearTemporary extends Component

{

    public function mount()
    {
        $this->refreshPage();
    }
    public function refreshPage()
    {
        $temporary = Temporary::all();

        foreach ($temporary as $tmp)
        {
            Storage::delete($tmp->file);
            $tmp->delete();
        }

    }
    public function render()
    {
        return view('livewire.clear-temporary');
    }

   
}
