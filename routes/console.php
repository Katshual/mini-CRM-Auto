<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;
use App\Models\Campaign;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\CampaignMail;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| Ce fichier permet de définir toutes les commandes Artisan basées sur des closures.
| En plus des commandes classiques, il est possible d'y ajouter des tâches planifiées
| via le Scheduler Laravel.
|
*/

// Commande existante : Affiche une citation inspirante
Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

// Tâche planifiée : Envoie les campagnes programmées aux utilisateurs
Schedule::call(function () {
    // Récupère les campagnes dont la date d'envoi est atteinte ou dépassée
    $campaigns = Campaign::where('send_at', '<=', now())->get();

    foreach ($campaigns as $campaign) {
        // Récupère tous les utilisateurs et leur envoie la campagne par e-mail
        $users = User::all();
        foreach ($users as $user) {
            Mail::to($user->email)->send(new CampaignMail($campaign));
        }
    }
})->everyMinute(); // Exécute cette tâche toutes les minutes
