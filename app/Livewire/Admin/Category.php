<?php

namespace App\Livewire\Admin;

use App\Models\Category as ModelsCategory;
use Livewire\Component;

class Category extends Component
{
    public string $type = "";
    public string $type_package = "";
    public string $description = "";
    public $categorys;
    public function mount()
    {
        $this->categorys = ModelsCategory::get();
    }
    public function saveCategory()
    {
        $this->validate([
            'type'=>['required','unique:'.ModelsCategory::class],
            'type_package'=>['required']
        ]);
        ModelsCategory::create([
            'type'=>$this->type,
            'description'=>nl2br($this->description),
            'type_package'=>$this->type_package
        ]);
        $this->redirect('/t-admin/Ajoute+des+categories',navigate:true);
    }
    public function render()
    {
        return view('livewire.admin.category');
    }
}
