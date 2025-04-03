<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; // Importation de la classe Request pour gérer les requêtes HTTP
use App\Models\Campaign;     // Importation du modèle Campaign pour interagir avec la base de données

class CampaignController extends Controller
{
    /**
     * Affiche la liste des campagnes.
     *
     * @return \\Illuminate\\View\\View
     */
    public function index()
    {
        // Récupère toutes les campagnes triées par date de création (plus récentes en premier)
        $campaigns = Campaign::latest()->get();

        // Retourne la vue 'campaigns.index' avec les campagnes disponibles
        return view('campaigns.index', compact('campaigns'));
    }

    /**
     * Enregistre une nouvelle campagne dans la base de données.
     *
     * @param \\Illuminate\\Http\\Request $request
     * @return \\Illuminate\\Http\\RedirectResponse
     */
    public function store(Request $request)
    {
        // Validation des données envoyées via le formulaire
        $request->validate([
            'title' => 'required|string|max:255', // Le titre est obligatoire et limité à 255 caractères
            'message' => 'required|string',      // Le message est obligatoire
            'send_at' => 'required|date',        // La date d'envoi est obligatoire et doit être valide
        ]);

        // Création d'une nouvelle campagne avec les données validées
        Campaign::create($request->all());

        // Redirection vers la liste des campagnes avec un message de succès
        return redirect()->route('campaigns.index')->with('success', 'Campagne ajoutée avec succès !');
    }
}
