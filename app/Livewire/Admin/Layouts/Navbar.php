<?php

namespace App\Livewire\Admin\Layouts;

use App\Livewire\Actions\Logout;
use Livewire\Component;

class Navbar extends Component
{

       public function logout(Logout $logout): void
    {
        $logout(); // perform logout
        $this->redirect('/'); // redirect to homepage
    }
    
    public function render()
    {
        return view('livewire.admin.layouts.navbar');
    }
    
}
