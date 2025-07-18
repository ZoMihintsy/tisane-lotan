<?php

namespace App\Mail;

use App\Models\Category;
use App\Models\PointDeVente;
use App\Models\Produit;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class Commands extends Mailable
{
    use Queueable, SerializesModels;
    use Queueable, SerializesModels;
    public $category;
    public $produit;
    public $place;
    public $nom;
    public $heure;
    public $date;
    /**
     * Create a new message instance.
     */
    public function __construct($panie , $emplace , $nom, $date, $heure)
    {
        //
        $this->date = $date;
        $this->heure = $heure;
        $this->produit = Produit::where('id',$panie)->first();
        $this->category = Category::where('id',$this->produit->category_id)->first();
        $this->place = PointDeVente::where('id',$emplace)->first();
        $this->nom = $nom;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Commands '.$this->produit->nom,
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'mail.commends', 
            with: [
                'produit' => $this->produit,
                'category' => $this->category,
                'place' => $this->place,
                'nom'=>$this->nom,
                'date'=>$this->date,
                'heure'=>$this->heure
            ],
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
