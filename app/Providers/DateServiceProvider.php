<?php

namespace App\Providers;

use Carbon\Carbon;
use Illuminate\Support\ServiceProvider;
use Pratiksh\Nepalidate\Facades\NepaliDate;

class DateServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        // <!-- Engdate -->
        $today = Carbon::now();
        $tomorrow = Carbon::now()->addDay();
        $yesterday = Carbon::now()->subDay();
        $tdatead = $today->toDateString();
        $tomdatead = $tomorrow->toDateString();
        $ydatead = $yesterday->toDateString();
        // <!-- NepDate -->
        $tdateBS = nepalidate($today);
        $tomdateBS = nepalidate($tomorrow);
        $ydateBS = nepalidate($yesterday);
        $todayFormattedBS = str_replace('-', '/', $tdateBS);
        $tomorrowFormattedBS = str_replace('-', '/', $tomdateBS);
        $yesterdayFormattedBS = str_replace('-', '/', $ydateBS);
        $todayFormattedad = str_replace('-', '/', $tdatead);
        $tomorrowFormattedad = str_replace('-', '/', $tomdatead);
        $yesterdayFormattedad = str_replace('-', '/', $ydatead);
        $this->app->singleton('nepali_dates', function () use ($todayFormattedBS, $tomorrowFormattedBS, $yesterdayFormattedBS, $todayFormattedad, $tomorrowFormattedad, $yesterdayFormattedad,) {
            return [
                'todaybs' => $todayFormattedBS,
                'tomorrowbs' => $tomorrowFormattedBS,
                'yesterdaybs' => $yesterdayFormattedBS,
                'todayad' => $todayFormattedad,
                'tomorrowad' => $tomorrowFormattedad,
                'yesterdayad' => $yesterdayFormattedad,

            ];
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void {}
}
