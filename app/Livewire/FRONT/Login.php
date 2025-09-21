<?php

namespace App\Livewire\FRONT;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Login extends Component
{
    public $email = '';
    public $password = '';

    public $remember;

    // public $loggedIn = false;

    protected $rules = [
        'email' => 'required|email',
        'password' => 'required|min:6',
    ];

    public function login()
    {
        $this->validate();

        if (Auth::guard('front')->attempt(['email' => $this->email, 'password' => $this->password])) {
            // $this->loggedIn = true;
            session()->regenerate();

            // Modal band karne ke liye JS event bhejna
            $this->dispatch('admin-login-success');

            // Redirect user to the page they originally wanted
            return redirect()->intended(route('profile'));

            // Dashboard par navigate karna bina reload ke
            // return $this->redirectRoute('profile', navigate: true);
        } else {
            $this->addError('email', 'Invalid email or password.');
        }
    }

    public function render()
    {
        return view('livewire.f-r-o-n-t.login');
    }
}
