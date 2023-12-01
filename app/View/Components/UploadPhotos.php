<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Livewire\WithFileUploads;
 
class UploadPhotos extends Component
{
    use WithFileUploads;
 
    public $photo;

    public function updatedPhoto()
    {
        $this->validate([
            'photo' => 'image|max:1024', // 1MB Max
        ]);
    }
 
    public function save()
    {
        $this->validate([
            'photos.*' => 'image|max:1024', // 1MB Max
        ]);
 
        foreach ($this->photos as $photo) {
            $photo->store('photos');
        }
    }
}
