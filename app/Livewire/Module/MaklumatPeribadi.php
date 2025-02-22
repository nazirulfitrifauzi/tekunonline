<?php

namespace App\Livewire\Module;

use Livewire\Component;
use App\Models\Negeri;
use App\Models\Cawangan;
use Illuminate\Support\Facades\Auth;
use App\Models\Bank;
use App\Models\MaklumatPeribadi as ModelsMaklumatPeribadi;
use App\Traits\MaklumatPeribadiValidation;

class MaklumatPeribadi extends Component
{
    use MaklumatPeribadiValidation;

    public $negeriSelection = []; // Pastikan ia sentiasa array
    public $cawanganSelection = [];
    public $bank = [];

    public function mount()
    {
        $existingData = ModelsMaklumatPeribadi::where('user_id', Auth::id())->first();

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

        // Dapatkan data sedia ada dalam database
        $existingData = ModelsMaklumatPeribadi::where('user_id', Auth::id())->first();

        // Jika wujud, gunakan nilai sedia ada, jika tidak, buat array kosong
        $existingDataArray = $existingData ? $existingData->toArray() : [];

        // Gabungkan data lama dengan data baru, tetapi pastikan nilai baru tidak menimpa dengan `null`
        $updatedData = array_merge($existingDataArray, array_filter($this->getFormData(), fn($value) => !is_null($value)));

        // Simpan data ke dalam database
        ModelsMaklumatPeribadi::updateOrCreate(
            ['user_id' => Auth::id()],
            $updatedData
        );
        
        return redirect()->route('home');
    }

    protected function getFormData()
    {
        return array_merge(
            ['user_id' => Auth::id()],
            collect($this->all())
                ->except(['negeriSelection', 'cawanganSelection', 'bank'])
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

        $this->cawanganSelection = Cawangan::where('kodnegeri', $this->tekun_state)
            ->where('batal', '!=', '1')
            ->where('kodcawangan', '!=', '1412')
            ->orderBy('namacawangan', 'ASC')
            ->get();

        $this->bank = Bank::select(['id', 'nama_bank'])
        ->where('res', '0')
        ->orderby('nama_bank', 'ASC')
        ->get();


        return view('livewire.module.maklumat-peribadi');
    }
}

