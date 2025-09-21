<?php

namespace App\Livewire\FRONT;

use Livewire\Component;
use App\Models\Registration;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class Home extends Component
{

    public
        // $data,
        $profile_for, $email, $mobile, $password, $password_confirmation;

    protected $rules = [
        'profile_for' => 'required',
        'email' => 'required|email|unique:registrations,email',
        'mobile' => 'required|string|min:10',
        'password' => 'required|min:6|confirmed',
    ];

    public function register()
    {
        $this->validate();

        $user = Registration::create([
            'profile_for' => $this->profile_for,
            'email' => $this->email,
            'mobile' => $this->mobile,
            'password' => Hash::make($this->password),
        ]);

        Auth::login($user);

        return redirect()->route('home'); // register ke baad redirect
    }

    // public function mount()
    // {
    //     $this->data = Registration::all();
    // }

    public function render()
    {
        $all = Registration::all();
        $female = Registration::where('gender', 'female')->get();
        $male = Registration::where('gender', 'male')->get();

        return view('livewire.f-r-o-n-t.home', compact('female','male'));
    }
}
