<?php

namespace App\Livewire\Module;

use App\Models\ApplnStatus;
use App\Models\MaklumatPinjaman;
use App\Traits\PinjamanTemanValidation;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use WireUi\Traits\WireUiActions;

class PinjamanTeman extends Component
{

    use PinjamanTemanValidation,WireUiActions;

    public function mount()
    {    
        $existingData = null; // Initialize to avoid undefined variable issues
        
        $applnStatus = ApplnStatus::where('user_id', Auth::id())->first();
        if ($applnStatus) {
            $existingData = MaklumatPinjaman::where('appln_id', $applnStatus->id)->first();
        }        
    
        if ($existingData) {
            foreach ($existingData->toArray() as $key => $value) {
                if (property_exists($this, $key)) {
                    $this->$key = $value;
                }
            }
        }
    }
    
    
    public function submit()
    {
        // Validate the form data
        $this->validate();
        
        // Dapatkan appln_id yang baru atau sedia ada
        $applnId = Auth::user()->applnStatus->id;

        // Dapatkan data sedia ada dalam MaklumatPinjaman
        $existingData = MaklumatPinjaman::where('appln_id', $applnId)->first();

        // Jika wujud, gunakan nilai sedia ada, jika tidak, buat array kosong
        $existingDataArray = $existingData ? $existingData->toArray() : [];

        // Gabungkan data lama dengan data baru, pastikan nilai baru tidak menimpa dengan `null`
        $updatedData = array_merge($existingDataArray, array_filter($this->getFormData($applnId), fn($value) => !is_null($value)));

        // Simpan data ke dalam MaklumatPinjaman
        MaklumatPinjaman::updateOrCreate(
            ['appln_id' => $applnId],
            $updatedData
        );

        $this->dialog()->show([
            'icon' => 'success',
            'title' => 'Berjaya!',
            'description' => 'Maklumat berjaya disimpan.',
        ]);

        $this->dispatch('saved');
    }

    protected function getFormData($applnId)
    {
        return array_merge(
            ['appln_id' => $applnId],
            collect($this->all())
                 ->toArray()
        );
    }
    
    public function render()
    {
        return view('livewire.module.pinjaman-teman');
    }
}