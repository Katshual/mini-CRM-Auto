<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

/**
 * Classe Mailable pour envoyer des e-mails liés aux campagnes.
 */
class CampaignMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Données de la campagne (titre, message).
     *
     * @var object
     */
    public $campaign;

    /**
     * Initialise les données de la campagne lors de l'instanciation.
     *
     * @param object $campaign Objet contenant les informations sur la campagne.
     */
    public function __construct($campaign)
    {
        $this->campaign = $campaign; // Stocke les données dans une propriété publique
    }

    /**
     * Configure et construit l'e-mail.
     *
     * @return $this Instance configurée avec sujet, vue et données associées.
     */
    public function build()
    {
        return $this->subject($this->campaign->title) // Définit le sujet comme le titre de la campagne
                    ->view('emails.campaign') // Spécifie la vue Blade utilisée pour générer le contenu HTML
                    ->with(['message' => $this->campaign->message]); // Passe les données dynamiques à la vue
    }
}
