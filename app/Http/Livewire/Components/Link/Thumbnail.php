<?php

namespace App\Http\Livewire\Components\Link;

use App\Models\Link;
use Livewire\Component;
use Livewire\WithFileUploads;

class Thumbnail extends Component
{
    use WithFileUploads;

    public Link $link;

    public $thumbnail;

    public $rules = [
        'thumbnail' => 'nullable|image|max:1024'
    ];

    public function mount(Link $link)
    {
        $this->link = $link;
    }

    public function updatedThumbnail()
    {
        $this->validate();

        $uploadPath = $this->thumbnail->storePublicly('thumnals', 'public');
        $publicPath = config('app.url').'/storage'.DIRECTORY_SEPARATOR.$uploadPath;
        $this->link->thumbnail = $publicPath;

        $this->link->save();
    }

    public function delete()
    {
    }

    public function render()
    {
        return view('livewire.components.link.thumbnail');
    }
}
