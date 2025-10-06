<?php

use Illuminate\Support\Facades\Route;
use Modules\Accounting\Http\Livewire\Test;
use Modules\Accounting\Http\Livewire\Welcome;

Route::middleware(['web', 'auth'])->prefix('accounting')->group(function () {
    Route::get('/', Welcome::class)->name('accounting.index');
    Route::get('/test', Test::class)->name('accounting.test');
});
