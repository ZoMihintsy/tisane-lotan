<?php

namespace App\Livewire\Guest;

use App\Models\Category as ModelsCategory;
use Livewire\Component;

class Category extends Component
{
    public $categorie;
    public function mount()
    {
        $this->categorie = ModelsCategory::get();
    }
    public function render()
    {
        return view('livewire.guest.category');
    }
}
