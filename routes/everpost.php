<?php

declare(strict_types=1);

use App\Http\Middleware\App\EnsureAccountReady;
use App\Http\Middleware\App\EnsureHasWorkspace;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::middleware(['auth', EnsureAccountReady::class, EnsureHasWorkspace::class])->group(function () {
    Route::get('content-studio', function () {
        return Inertia::render('content-studio/Index', [
            'platforms' => [
                ['name' => 'Instagram', 'bestTimes' => ['Tuesday 11:00', 'Wednesday 11:00', 'Thursday 14:00']],
                ['name' => 'Facebook', 'bestTimes' => ['Tuesday 09:00', 'Wednesday 13:00', 'Friday 10:00']],
                ['name' => 'LinkedIn', 'bestTimes' => ['Tuesday 08:00', 'Wednesday 10:00', 'Thursday 09:00']],
                ['name' => 'X', 'bestTimes' => ['Monday 09:00', 'Wednesday 12:00', 'Friday 11:00']],
                ['name' => 'TikTok', 'bestTimes' => ['Tuesday 19:00', 'Thursday 19:00', 'Saturday 11:00']],
                ['name' => 'YouTube', 'bestTimes' => ['Thursday 18:00', 'Friday 15:00', 'Sunday 10:00']],
                ['name' => 'Pinterest', 'bestTimes' => ['Friday 20:00', 'Saturday 11:00', 'Sunday 20:00']],
                ['name' => 'Threads', 'bestTimes' => ['Tuesday 10:00', 'Wednesday 12:00', 'Thursday 11:00']],
            ],
        ]);
    })->name('app.content-studio');

    Route::get('content-os', fn () => Inertia::render('content-os/Index'))
        ->name('app.content-os');

    Route::get('competitors', fn () => Inertia::render('competitors/Index'))
        ->name('app.competitors');
});
