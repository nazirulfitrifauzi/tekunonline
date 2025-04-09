<?php

namespace App\Livewire;

use App\Livewire\Module\MaklumatPerniagaan;
use App\Models\ApplnStatus;
use Livewire\Component;

class Home extends Component
{
    public $appln_id;
    public $appln;

    public int $activeTab = 1;

   
    public bool $tab1_enabled = false;
    public bool $tab2_enabled = false;
    public bool $tab3_enabled = false;
    public bool $tab4_enabled = false;
    public bool $tab5_enabled = false;

    protected $queryString = [
        'appln_id',
        // Persist the active tab in the URL so the user can refresh/share links
        'activeTab' => ['except' => 1],
    ];
    
    protected $listeners = [
        'enableTab',          // Children tell us when to unlock a tab
        'redirectToTab' => 'setActiveTab',
    ];

    public function mount(): void
    {
        // $this->appln = ApplnStatus::find($this->appln_id);

        // if ($this->appln) {
        //     $this->tab1_enabled = (bool) $this->appln->tab1_maklumat_peribadi;
        //     $this->tab2_enabled = (bool) $this->appln->tab2_maklumat_perniagaan;
        //     $this->tab3_enabled = (bool) $this->appln->tab3_maklumat_perniagaan_2;
        //     $this->tab4_enabled = (bool) $this->appln->tab4_maklumat_pembiayaan;
        //     $this->tab5_enabled = (bool) $this->appln->tab5_muat_naik_dokumen;
        // }
    }

    public function enableTab(int $tab): void
    {
        $property = "tab{$tab}_enabled";
        if (property_exists($this, $property)) {
            $this->{$property} = true;
        }
    }

    public function setActiveTab(int $tab): void
    {
        $this->activeTab = $tab;
    }

    // public function mp(){
    //     $this->dispatch('tab-mp')->to(MaklumatPerniagaan::class);
    // }

    public function render()
    {
        return view('livewire.home')->layout('layouts.app');
    }
}
