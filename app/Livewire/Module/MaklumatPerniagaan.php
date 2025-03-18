<?php

namespace App\Livewire\Module;

use App\Models\ApplnStatus;
use Livewire\Component;
use App\Models\Negeri;
use Illuminate\Support\Facades\Auth;
use App\Models\JenisAktivitiBaru;
use App\Models\JenisPerniagaan;
use App\Models\MaklumatPerniagaan as ModelsMaklumatPerniagaan;
use App\Traits\MaklumatPerniagaanValidation;
use WireUi\Traits\WireUiActions;

class MaklumatPerniagaan extends Component
{
    use MaklumatPerniagaanValidation, WireUiActions;

    public $sektorSelection = []; // Pastikan ia sentiasa array
    public $aktivitiSelection = [];
    public $negeriSelection = [];


    public function mount()
    {
        // Load existing data if any

        $existingData = null; // Initialize to avoid undefined variable issues

        $applnStatus = ApplnStatus::where('user_id', Auth::id())->first();
        if ($applnStatus) {
            $existingData = ModelsMaklumatPerniagaan::where('appln_id', $applnStatus->id)->first();
        }        
    
        if ($existingData) {
            foreach ($existingData->toArray() as $key => $value) {
                if (property_exists($this, $key)) {
                    $this->$key = $value;
                }
            }
        }

        // // Format business_modal if it exists
        // if ($this->business_modal) {
        //     $this->business_modal = number_format((float)$this->business_modal, 0, '.', ',');
        // }
    }

    protected function isMuslim()
    {
        $maklumatPeribadi = MaklumatPeribadi::where('appln_id', Auth::id())->first();
        return $maklumatPeribadi && $maklumatPeribadi->religion === 'ISLAM';
    }

    public function loadSektorSelection()
    {
        // Base query for all sectors
        $query = JenisPerniagaan::select(['idPerniagaan', 'jenisPerniagaan']);
        
        // If business_syariah is "0" (TIDAK), only show specific sectors
        if ($this->business_syariah == '0') {
            $query->where(function($q) {
                $q->where('sektor', 'Peruncitan')
                  ->orWhere('sektor', 'Perkhidmatan')
                  ->orWhere('sektor', 'Tani'); // This corresponds to PERTANIAN DAN PERUSAHAAN ASAS TANI
            });
        } else {
            // For "YA" (1) or not selected yet, show all sectors
            $query->where(function($q) {
                $q->where('lain', '1')
                  ->orWhere('sektor', 'Peruncitan')
                  ->orWhere('sektor', 'Perkhidmatan')
                  ->orWhere('sektor', 'Pembuatan')
                  ->orWhere('sektor', 'Kontraktor Kecil')
                  ->orWhere('sektor', 'Tani');
            });
        }
        
        $this->sektorSelection = $query->get();
        
        // Reset business_sector if it's not in the filtered list
        if ($this->business_sector && !collect($this->sektorSelection)->pluck('idPerniagaan')->contains($this->business_sector)) {
            $this->business_sector = '';
        }
    }

        // untuk campurkan dua variable jadi satu dan debug
    //yang last tu kena related dngn nama function
    public function updatedBusinessClosed()
    {
        $this->business_time = $this->business_open . ' hingga ' . $this->business_closed;
    }


    public function submit()
    {
        $this->validate();

        $applnStatus = ApplnStatus::updateOrCreate(
            ['user_id' => Auth::id()],
            ['status' => 'P']
        );

        $applnId = $applnStatus->id;

        $formData = collect($this->all())
            ->except(['sektorSelection', 'aktivitiSelection', 'negeriSelection'])
            ->toArray();

        $formData['appln_id'] = $applnId;

        MaklumatPerniagaan::updateOrCreate(
            ['appln_id' => $applnId],
            $formData
        );

        session()->flash('message', 'Maklumat perniagaan berjaya disimpan.');
    }
    
    protected function getFormData($applnId)
    {
        return array_merge(
            ['appln_id' => $applnId],
            collect($this->all())
                ->except(['sektorSelection', 'aktivitiSelection', 'negeriSelection'])
                ->toArray()
        );
    }
    
    public function render()
    {
        // Ambil senarai negeri
        $this->negeriSelection = Negeri::select(['kodnegeri', 'namanegeri'])
        ->where('kod', '!=', '1')
        ->orderBy('namanegeri', 'ASC')
        ->get();
    
        $this->sektorSelection = JenisPerniagaan:: select (['idPerniagaan', 'jenisPerniagaan'])
            ->where(function ($q) {
            $q->where('lain', '1')
            ->orWhere('sektor', 'Peruncitan')
            ->orWhere('sektor', 'Perkhidmatan')
            ->orWhere('sektor', 'Pembuatan')
            ->orWhere('sektor', 'Kontraktor Kecil')
            ->orWhere('sektor', 'Tani');
        })->get();


        $this->aktivitiSelection = JenisAktivitiBaru::where('idsektor', $this->business_sector)
        ->where('status', '=', '1')
        ->orderBy('Aktiviti', 'ASC')
        ->get();


        return view('livewire.module.maklumat-perniagaan');
    }
}
