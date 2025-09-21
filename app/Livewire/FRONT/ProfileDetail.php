<?php

namespace App\Livewire\FRONT;

use Livewire\Component;
use App\Models\Registration;


class ProfileDetail extends Component
{
    public $detail;

    public function mount($id)
    {
        $this->detail = Registration::findOrFail($id);
        // $this->detail = Registration::where('slug', $slug)->firstOrFail();
    }
    public function render()
    {
        return view('livewire.f-r-o-n-t.profile-detail');
    }
}
