<?php

namespace App\Livewire;

use App\Livewire\Forms\LoginForm;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Livewire\Component;

class Login extends Component
{

    public LoginForm $form;

    public function login(): Application|Redirector|RedirectResponse
    {
        return $this->form->attemptLogin();
    }

    public function render()
    {
        return view('livewire.login')->layout('components.layouts.app');
    }
}
