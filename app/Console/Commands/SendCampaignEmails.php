<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Campaign;
use App\Mail\CampaignMail;
use Illuminate\Support\Facades\Mail;

class SendCampaignEmails extends Command
{
    protected $signature = 'campaigns:send';
    protected $description = 'Send scheduled campaign emails';

    public function handle()
    {
        $campaigns = Campaign::where('send_at', '<=', now())
            ->get();

        foreach ($campaigns as $campaign) {
            Mail::send(new CampaignMail($campaign));
        }
    }
}

