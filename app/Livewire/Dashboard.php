<?php

namespace App\Livewire;

use App\Models\ApplnStatus;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Dashboard extends Component
{
    public function render()
    {
        $user = Auth::user();

        $applnStatuses = ApplnStatus::where('user_id', $user->id)
                            ->where('appln_status', 'S')
                            ->get();        
        return view('livewire.dashboard', [
            'user' => $user,'applnStatuses' => $applnStatuses
        ])->layout('layouts.app');
    }
} 