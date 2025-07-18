<?php

namespace App\Livewire\Admin;

use App\Models\Commentaire as ModelsCommentaire;
use Livewire\Component;

class Commentaire extends Component
{
    public $remarques;
    public function mount()
    {
        $this->remarques = ModelsCommentaire::get();
    }
    public function render()
    {
        return view('livewire.admin.commentaire');
    }
}
