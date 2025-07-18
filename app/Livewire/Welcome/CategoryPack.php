<?php

namespace App\Livewire\Welcome;

use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;

class CategoryPack extends Component
{
    use WithPagination;

    public function mount()
    {
        
    }
    public function render()
    {
        $category = Category::paginate(4);
        return view('livewire.welcome.category-pack',['category'=>$category]);
    }
}
