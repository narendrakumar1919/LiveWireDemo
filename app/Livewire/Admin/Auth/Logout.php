<?php

namespace App\Livewire\Admin\Auth;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Logout extends Component
{
    public function logout()
    {
        Auth::logout();
        return $this->redirectRoute('login', navigate: true);

    }
    public function render()
    {
        return <<<'HTML'
        <div>
        <button type="submit" class="dropdown-item" wire:click="logout"><i class="si si-logout mr-5"></i> Logout</button>
        </div>
        HTML;
    }
}
