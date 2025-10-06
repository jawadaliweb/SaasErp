<?php

namespace Modules\Accounting\Http\Livewire;

use Livewire\Component;

class Welcome extends Component
{
    public $user;

    public function mount()
    {
        $this->user = auth()->user(); // works with web+auth middleware
    }

    public function render()
    {
        return view('accounting::welcome');
    }
    
}