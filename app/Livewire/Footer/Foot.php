<?php

namespace App\Livewire\Footer;

use App\Mail\Remarque;
use App\Models\Commentaire;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class Foot extends Component
{
public string $nom = "";
public string $email = "";
public string $message = "";
public $remarques;
public function mount()
{
    $this->remarques = Commentaire::orderBy('created_at','desc')->get();
}
    public function sendMessage()
    {
        $this->validate([
            'nom'=>['required'],
            'message'=>'required',
            'email'=>['required','email']
        ]);
        $nom = $this->nom;
        $email = $this->email;
        $messages = $this->message;
        Commentaire::create([
            'nom'=>$this->nom,
            'message'=>nl2br($this->message),
            'email'=>$this->email
        ]);
        $this->nom = "";
$this->email = "";
$this->message = "";
        Mail::to(config('app.admin_email'))
        ->queue(new Remarque($nom, $email, $messages));
        session()->flash('status','Commentaire envoyer!');
        
        $this->redirect('/',navigate:true);
    }
    public function render()
    {
        return view('livewire.footer.foot');
    }
     public function del()
    {
        
    }
}
