<?php

namespace App\Livewire\Module;

use Livewire\Component;
use App\Models\Negeri;
use Illuminate\Support\Facades\Auth;
use App\Models\JenisAktivitiBaru;
use App\Models\JenisPerniagaan;
use App\Models\MaklumatPerniagaan as ModelsMaklumatPerniagaan;
use App\Traits\MaklumatPerniagaanValidation;

class MaklumatPerniagaan extends Component
{
    use MaklumatPerniagaanValidation;

    public $sektorSelection = []; // Pastikan ia sentiasa array
    public $aktivitiSelection = [];
    public $negeriSelection = [];


    // public function mount()
    // {
    //     $negeri = Auth::user()->maklumatPeribadi->tekun_state;
    // }

    public function submit()
    {
        // validation
        // $this->validate();
        
        // Dapatkan data sedia ada dalam database
        $existingData = ModelsMaklumatPerniagaan::where('appln_id', Auth::id())->first();

        // Jika wujud, gunakan nilai sedia ada, jika tidak, buat array kosong
        $existingDataArray = $existingData ? $existingData->toArray() : [];

        // Gabungkan data lama dengan data baru, tetapi pastikan nilai baru tidak menimpa dengan `null`
        $updatedData = array_merge($existingDataArray, array_filter($this->getFormData(), fn($value) => !is_null($value)));

        // Simpan data ke dalam database
        ModelsMaklumatPerniagaan::updateOrCreate(
            ['appln_id' => Auth::id()],
            $updatedData
        );

        return redirect()->route('home');
    }

    // untuk campurkan dua variable jadi satu dan debug
    //yang last tu kena related dngn nama function
    public function updatedBusinessClosed()
    {
        $this->business_time = $this->business_open . ' hingga ' . $this->business_closed;
    }
    
    protected function getFormData()
    {
        return array_merge(
            ['appln_id' => Auth::id()],
            collect($this->all())
                ->except(['sektorSelection', 'aktivitiSelection', 'negeriSelection'])
                ->toArray()
        );
    }

    public function mount()
    {
        $existingData = ModelsMaklumatPerniagaan::where('appln_id', Auth::id())->first();

        if ($existingData) {
            foreach ($existingData->toArray() as $key => $value) {
                if (property_exists($this, $key)) {
                    $this->$key = $value;
                }
            }
        }
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
