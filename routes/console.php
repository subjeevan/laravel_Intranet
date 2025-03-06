<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Support\Facades\Schedule as ScheduleFacade;

ScheduleFacade::command('email:send-scheduled')->dailyAt('08:29');

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');


// MAIL_MAILER=smtp
// MAIL_SCHEME=null
// MAIL_HOST=smtp.gmail.com
// MAIL_PORT=465
// MAIL_USERNAME=no.reply.beh@gmail.com
// MAIL_PASSWORD="ekrz mcbl knzx llob"
// MAIL_FROM_ADDRESS="no.reply.beh@gmail.com"
// MAIL_FROM_NAME="${APP_NAME}"
