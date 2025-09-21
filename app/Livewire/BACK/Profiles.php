<?php

namespace App\Livewire\BACK;

use Livewire\Component;
use App\Models\Registration;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;

#[Layout('components.layouts.admin')]
#[Title('Profiles')]


class Profiles extends Component
{
    public function render()
    {
        $all = Registration::all();
        return view('livewire.b-a-c-k.profiles',compact('all'));
    }
}
