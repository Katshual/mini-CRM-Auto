<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Migration pour créer la table 'campaigns'.
 * Cette table est utilisée pour gérer les campagnes marketing ou de communication.
 */
return new class extends Migration
{
    /**
     * Exécute les migrations.
     * Cette méthode crée la table 'campaigns' avec les colonnes nécessaires.
     */
    public function up(): void
    {
        Schema::create('campaigns', function (Blueprint $table) {
            $table->id(); // Identifiant unique pour chaque campagne.
            $table->string('title'); // Titre de la campagne, utilisé pour identifier ou décrire la campagne.
            $table->text('message'); // Message ou contenu de la campagne, généralement envoyé aux utilisateurs.
            $table->timestamp('send_at')->nullable(); // Date et heure programmées pour l'envoi de la campagne (peut être null si non planifié).
            $table->timestamps(); // Colonnes created_at et updated_at pour le suivi des modifications.
        });
    }

    /**
     * Annule les migrations.
     * Cette méthode supprime la table 'campaigns' si elle existe.
     */
    public function down(): void
    {
        Schema::dropIfExists('campaigns'); // Supprime la table 'campaigns' de la base de données.
    }
};
