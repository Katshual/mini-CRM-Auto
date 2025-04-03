<?php

use Illuminate\\Support\\Facades\\Route;
use App\\Http\\Controllers\\CampaignController; // Importation du CampaignController

/*
|--------------------------------------------------------------------------
| Routes Web
|--------------------------------------------------------------------------
|
| Ce fichier contient les routes pour l'interface web de votre application.
| Ces routes sont assignées au middleware "web", qui fournit des fonctionnalités
| comme la gestion des sessions et la protection CSRF.
|
*/

// Route GET pour afficher la liste des campagnes
// Accessible à l'URL racine de l'application (<http://127.0.0.1:8000/>)
Route::get('/', [CampaignController::class, 'index'])->name('campaigns.index');

// Route POST pour créer une nouvelle campagne
// Accessible à l'URL <http://127.0.0.1:8000/campaigns>
Route::post('/campaigns', [CampaignController::class, 'store'])->name('campaigns.store');
