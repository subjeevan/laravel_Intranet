<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Mail\ScheduledEmail;
use Illuminate\Support\Facades\Mail;

class SendScheduledEmail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    // protected $signature = 'app:send-scheduled-email';
    protected $signature = 'email:send-scheduled';
    protected $description = 'Send a scheduled email';

    public function handle()
    {
        Mail::to('subjeevan@gmail.com')->send(new ScheduledEmail());
        $this->info('Scheduled email sent successfully.');
    }
}
