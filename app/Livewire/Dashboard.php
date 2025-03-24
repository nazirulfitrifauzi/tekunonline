<?php

namespace App\Livewire;

use App\Models\ApplnStatus;
use App\Models\MaklumatPeribadi as ModelsMaklumatPeribadi;
use App\Models\MaklumatPinjaman as ModelsMaklumatPinjaman;
use App\Models\MaklumatPerniagaan as ModelsMaklumatPerniagaan;
use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Traits\MaklumatPeribadiValidation;
use Carbon\Carbon;
use WireUi\Traits\WireUiActions;

class Dashboard extends Component
{
    use MaklumatPeribadiValidation, WireUiActions;

    public $disableButton = false;
    public $user;

    public function mount()
    {
        //dd($this->tekun_branch,$this->tekun_state);
        $this->user = Auth::user();
        
       
        // Semak jika terdapat permohonan dengan appln_status_fas = 1 atau NULL
        $this->disableButton = ApplnStatus::where('user_id', $this->user->id)
                            ->whereIn('appln_status',array('S','P'))
                            ->where(function ($query) {
                                $query->where('appln_status_fas',1)
                                      ->orWhereNull('appln_status_fas');
                            })
                            ->first();
        //dd($this->disableButton);
    }

    public function save(){
        
        //1)Insert appln_status
        $applnStatus = ApplnStatus::where('appln_status','<>','P')->updateOrCreate(
            ['user_id' => Auth::id(),
            'appln_status' => 'P',
            'cust_icno' => $this->user->ic_no,
            'cust_name' => $this->user->name,
            'created_at' => now(),
            'updated_at' => now(),
            ]
        );

        //2) $maklumatPeribadi
        $maklumatPeribadi = ModelsMaklumatPeribadi::updateOrCreate(
            ['appln_id' => $applnStatus->id]
        );

        //3) $maklumatPinjaman
        $maklumatPinjaman = ModelsMaklumatPinjaman::updateOrCreate(
            ['appln_id' => $applnStatus->id]
        );

        //4) $maklumatPerniagaan
        $maklumatPerniagaan = ModelsMaklumatPerniagaan::updateOrCreate(
            ['appln_id' => $applnStatus->id]
        );

        return redirect()->route('home', ['appln_id' => $applnStatus->id]);

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
