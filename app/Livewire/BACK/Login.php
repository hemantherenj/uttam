<?php

namespace App\Livewire\BACK;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;

#[Layout('components.layouts.auth')]
#[Title('Login')]


class Login extends Component
{
    public $email, $password, $remember = false;

    protected $rules = [
        'email' => 'required|email',
        'password' => 'required|min:6',
    ];

    public function login()
    {
        $this->validate();
        
        if (Auth::guard('user')->attempt(['email' => $this->email, 'password' => $this->password])) {
            session()->regenerate();
            $this->dispatch('user-login-success');
            // return $this->redirectRoute('admin', navigate: true);
            return redirect()->route('admin');
        } else {
            $this->addError('email', 'Invalid email or password.');
        }

        // if (Auth::attempt(['email' => $this->email, 'password' => $this->password], $this->remember)) {
        //     session()->regenerate();
        //     // return $this->redirectRoute('admin', navigate: true);
        //     return redirect()->route('admin');
        // }

        // if (Auth::attempt(['email' => $this->email, 'password' => $this->password], $this->remember)) {
        //     session()->regenerate();
        //     $this->dispatch('login-success');
        // }


        $this->addError('email', 'These credentials do not match our records.');
    }

    public function render()
    {
        return view('livewire.b-a-c-k.login');
    }
}
