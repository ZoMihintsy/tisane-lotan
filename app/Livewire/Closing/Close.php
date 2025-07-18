<?php

namespace App\Livewire\Closing;

use Livewire\Component;

class Close extends Component
{
    public string $name ="" ;
    public function render()
    {
        return view('livewire.closing.close');
    }
    
}
