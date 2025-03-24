<?php

namespace App\Livewire\Module;

use App\Models\ApplnStatus;
use App\Models\MaklumatPerniagaan;
use App\Models\Negeri;
use App\Traits\MaklumatPerniagaan2Validation;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use WireUi\Traits\WireUiActions;

class MaklumatPerniagaan2 extends Component
{
    use MaklumatPerniagaan2Validation, WireUiActions;

    // Add other properties as needed

    public $appln_id;

    protected $queryString = ['appln_id'];
    
    public $negeriSelection = [];

    public function mount()
    {
        $existingData = null; // Initialize to avoid undefined variable issues

        $applnStatus = ApplnStatus::where('id', $this->appln_id)->first();
        if ($applnStatus) {
            $existingData = MaklumatPerniagaan::where('appln_id', $applnStatus->id)->first();
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
        //dd($this->appln_id);
        $this->validate();

        // Dapatkan appln_id yang baru atau sedia ada
        $applnId = $this->appln_id;
        

        // Dapatkan data sedia ada dalam MaklumatPinjaman
        $existingData = MaklumatPerniagaan::where('appln_id', $applnId)->first();

        // Jika wujud, gunakan nilai sedia ada, jika tidak, buat array kosong
        $existingDataArray = $existingData ? $existingData->toArray() : [];

        // Gabungkan data lama dengan data baru, pastikan nilai baru tidak menimpa dengan `null`
        $updatedData = array_merge($existingDataArray, array_filter($this->getFormData($applnId), fn($value) => !is_null($value)));

        // Simpan data ke dalam MaklumatPinjaman
        MaklumatPerniagaan::updateOrCreate(
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
        
        return view('livewire.module.maklumat-perniagaan2');
    }
}