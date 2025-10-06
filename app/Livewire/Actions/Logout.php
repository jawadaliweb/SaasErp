<?php

namespace App\Livewire\Actions;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class Logout extends Component
{
    public function logout()
    {
        Auth::guard('web')->logout();
        Session::invalidate();
        Session::regenerateToken();

        // Redirect dynamically without page reload
        return redirect()->route('login');
    }

    public function render()
    {
        //render login view
        return view('livewire.admin.auth.login')
            ->layout('components.auth-layout');
    }
}
