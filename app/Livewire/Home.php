<?php

namespace App\Livewire;

use App\Livewire\Module\MaklumatPerniagaan;
use App\Models\ApplnStatus;
use Livewire\Component;

class Home extends Component
{
    public $appln_id;
    public $appln;

   
    public $tab1_enabled;
    public $tab2_enabled;
    public $tab3_enabled;
    public $tab4_enabled;
    public $tab5_enabled;

    protected $queryString = ['appln_id'];

    public function mount(){
        $this->appln = ApplnStatus::where('id',$this->appln_id)->first();
        if ($this->appln) {
            $this->tab1_enabled = $this->appln->tab1_maklumat_peribadi != null;
            $this->tab2_enabled = $this->appln->tab2_maklumat_perniagaan != null;
            $this->tab3_enabled = $this->appln->tab3_maklumat_perniagaan_2 != null;
            $this->tab4_enabled = $this->appln->tab4_maklumat_pembiayaan != null;
            $this->tab5_enabled = $this->appln->tab5_muat_naik_dokumen != null;
        }
    }

    public function mp(){
        $this->dispatch('tab-mp')->to(MaklumatPerniagaan::class);
    }

    public function render()
    {
        return view('livewire.home')->layout('layouts.app');
    }
}
