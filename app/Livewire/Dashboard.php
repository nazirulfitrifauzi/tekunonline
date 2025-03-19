<?php

namespace App\Livewire;

use App\Models\ApplnStatus;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Dashboard extends Component
{
    public $disableButton = false;

    public function mount()
    {
        $user = Auth::user();
        
        // Semak jika terdapat permohonan dengan appln_status_fas = 1 atau NULL
        $this->disableButton = ApplnStatus::where('user_id', $user->id)
                            ->where('appln_status', 'S')
                            // ->where(function ($query) {
                            //     $query->where('appln_status', 'S')
                            //           ->orWhereNull('appln_status_fas');
                            // })
                            ->first();
    }

    public function render()
    {
        $user = Auth::user();
        $applnStatuses = ApplnStatus::where('user_id', $user->id)->get();

        return view('livewire.dashboard', [
            'user' => $user,
            'applnStatuses' => $applnStatuses,
            'disableButton' => $this->disableButton,
        ])->layout('layouts.app');
    }
}
