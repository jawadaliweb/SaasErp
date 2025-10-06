<?php

use App\Livewire\Admin\Auth\Login;
use App\Livewire\Admin\Dashboard;
use Illuminate\Support\Facades\Route;


Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

    Route::get('/login', Login::class)->name('login');
    Route::get('/', Login::class);
    Route::get('/Dashboard', Dashboard::class)->name('admin.dashboard');

    
// require __DIR__.'/auth.php';
