<?php

namespace App\Livewire\Module;

use App\Models\MaklumatPinjaman;
use App\Models\Negeri;
use App\Models\ApplnStatus;
use Illuminate\Support\Facades\Auth;
use App\Traits\PinjamanKontrakIValidation;
use Livewire\Component;
use WireUi\Traits\WireUiActions;

class PinjamanKontrakI extends Component
{
    use PinjamanKontrakIValidation, WireUiActions;

    public $negeriSelection = [];

    
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
        $this->validate();
        
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
                ->except(['negeriSelection'])
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

        return view('livewire.module.pinjaman-kontrak-i');
    }
}
