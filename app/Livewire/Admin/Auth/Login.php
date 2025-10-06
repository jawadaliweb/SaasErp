<?php

namespace App\Livewire\Admin\Auth;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Login extends Component
{
    public $email = '';
    public $password = '';
    public $remember = false;

    protected $rules = [
        'email' => 'required|email',
        'password' => 'required|min:6',
    ];

    public function login()
    {
        $this->validate();

        if (Auth::attempt(['email' => $this->email, 'password' => $this->password], $this->remember)) {
            session()->regenerate();

            // Livewire friendly redirect (AJAX)
            return redirect()->intended(route('admin.dashboard'));
        }

        $this->addError('email', 'Invalid credentials.');
    }


    public function render()
    {
        return view('livewire.admin.auth.login')
            ->layout('components.auth-layout');
    }
}
