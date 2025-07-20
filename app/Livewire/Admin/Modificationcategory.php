<?php

namespace App\Livewire\Admin;

use App\Models\Category;
use Livewire\Component;

class Modificationcategory extends Component
{
    public $id;
    public $categorie;
    public string $type="";
    public string $type_package="";
    public string $description="";
    public function mount()
    {
        $categorie = Category::where('id',$this->id)->first();
        if(empty($categorie))
    {
        $this->redirect("t-admin/dashboard",navigate:true);
    }else{
        $this->type = $categorie->type;
        $this->type_package = $categorie->type_package;
        $this->description = str_replace('<br />','',$categorie->description);
    }
    }
    public function saveCategory()
    {
        $this->validate([
            'type'=>'required',
            'type_package'=>'required',
        ]);
        Category::where('id',$this->id)->update([
            'type'=>$this->type,
            'type_package'=>$this->type_package,
            'description'=>nl2br($this->description)
        ]);
        session()->flash('status','Modification '.$this->type.' success');
        $this->redirect('/t-admin/Ajoute+des+categories',navigate:true);
    }
    public function render()
    {
        return view('livewire.admin.modificationcategory');
    }
}
