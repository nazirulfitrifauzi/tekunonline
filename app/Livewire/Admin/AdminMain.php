<?php

namespace App\Livewire\Admin;

use Livewire\Component;

class AdminMain extends Component
{
    public function render()
    {
        return view('livewire.admin.admin-main')
        ->layout('layouts.app');
    }
}
