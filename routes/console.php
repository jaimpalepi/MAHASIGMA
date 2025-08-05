<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;
use App\Console\Commands\UpdateBeasiswaStatus;
use Illuminate\Support\Facades\DB;
use App\Models\Beasiswa;

// Artisan::command('inspire', function () {
//     $this->comment(Inspiring::quote());
// })->purpose('Display an inspiring quote');

 
Schedule::call(function () {
    Beasiswa::whereDate('deadline', '<=', now())
        ->where('status', '!=', 'closed')
        ->update([
            'status' => 'closed',
        ]);

        \Log::info('Beasiswa status updater ran. Rows affected: ' . $affected);
})->daily();
