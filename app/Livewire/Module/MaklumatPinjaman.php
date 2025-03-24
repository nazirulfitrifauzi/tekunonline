<?php

namespace App\Livewire\Module;

use App\Models\ApplnStatus;
use App\Models\MaklumatPinjaman as ModelsMaklumatPinjaman;
use App\Models\Negeri;
use App\Traits\MaklumatPinjamanValidation;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use WireUi\Traits\WireUiActions;

class MaklumatPinjaman extends Component
{
    use MaklumatPinjamanValidation, WireUiActions;

    public $negeriSelection = []; // Pastikan ia sentiasa array
    public $date_of_birth;
    public $age;
    public $appln_id;

    protected $queryString = ['appln_id'];

    public function mount()
    {
        $existingData = null; // Initialize to avoid undefined variable issues

        $applnStatus = ApplnStatus::where('id', $this->appln_id)->first();
        if ($applnStatus) {
            $existingData = ModelsMaklumatPinjaman::where('appln_id', $applnStatus->id)->first();
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
        
        // Dapatkan appln_id yang baru atau sedia ada
        $applnId = $this->appln_id;

        // Dapatkan data sedia ada dalam MaklumatPinjaman
        $existingData = ModelsMaklumatPinjaman::where('appln_id', $applnId)->first();

        // Jika wujud, gunakan nilai sedia ada, jika tidak, buat array kosong
        $existingDataArray = $existingData ? $existingData->toArray() : [];

        // Gabungkan data lama dengan data baru, pastikan nilai baru tidak menimpa dengan `null`
        $updatedData = array_merge($existingDataArray, array_filter($this->getFormData($applnId), fn($value) => !is_null($value)));

        // Simpan data ke dalam MaklumatPinjaman
        ModelsMaklumatPinjaman::updateOrCreate(
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

    public function getAge()
    {
        if ($this->date_of_birth) {
            return \Carbon\Carbon::parse($this->date_of_birth)->age;
        }
        return null;
    }

    public function render()
    {
        // Ambil senarai negeri
        $this->negeriSelection = Negeri::select(['kodnegeri', 'namanegeri'])
        ->where('kod', '!=', '1')
        ->orderBy('namanegeri', 'ASC')
        ->get();    

        return view('livewire.module.maklumat-pinjaman');
    }
}
