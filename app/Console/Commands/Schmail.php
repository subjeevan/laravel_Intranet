<?php

namespace App\Console\Commands;
use App\Mail\ScheduledEmail;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class Schmail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */

    /**
     * The console command description.
     *
     * @var string
     */
    protected $signature = 'email:send-scheduled';
    protected $description = 'Send a scheduled email';

    public function handle()
    {
        Mail::to('subjeevan@gmail.com')->send(new ScheduledEmail());
        $this->info('Scheduled email sent successfully.');
    }
}
