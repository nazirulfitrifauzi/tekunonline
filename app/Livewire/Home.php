<?php

namespace App\Livewire;

use Livewire\Component;

class Home extends Component
{
    public $appln_id;

    protected $queryString = ['appln_id'];

    public function render()
    {
        return view('livewire.home')->layout('layouts.app');
    }
}
