<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Artisan;
use App\Models\Campaign;
use App\Mail\CampaignMail;

use Illuminate\Foundation\Testing\RefreshDatabase;

class CampaignTest extends TestCase
{
    use RefreshDatabase;

    public function test_campaign_email_is_sent()
    {
        // Fait en sorte que l'envoi des e-mails soit simulé
        Mail::fake();

        // Crée une campagne fictive avec des données de test
        $campaign = Campaign::factory()->create([
            'title' => 'Test Campaign',
            'message' => 'Ceci est un test',
            'send_at' => now()
        ]);

        // Exécute les tâches planifiées
        Artisan::call('campaigns:send');

        // Vérifie qu'un e-mail de type CampaignMail a été envoyé
        Mail::assertSent(CampaignMail::class);
    }
}
