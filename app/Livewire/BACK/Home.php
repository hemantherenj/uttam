<?php

namespace App\Livewire\BACK;

use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;

#[Layout('components.layouts.admin')]
#[Title('Dashboard')]

class Home extends Component
{
    public function render()
    {
        return view('livewire.b-a-c-k.home');
    }
}
