<?php

namespace App\Livewire\Module;

use App\Models\MaklumatPerniagaan;
use App\Models\Negeri;
use App\Traits\MaklumatPerniagaan2Validation;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class MaklumatPerniagaan2 extends Component
{
    use MaklumatPerniagaan2Validation;

    public $negeriSelection = [];

    public function mount()
    {
        $existingData = MaklumatPerniagaan::where('appln_id', Auth::id())->first();

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
        // validation
        // $this->validate();

        // Dapatkan data sedia ada dalam database
        $existingData = MaklumatPerniagaan::where('appln_id', Auth::id())->first();

        // Jika wujud, gunakan nilai sedia ada, jika tidak, buat array kosong
        $existingDataArray = $existingData ? $existingData->toArray() : [];

        // Gabungkan data lama dengan data baru, tetapi pastikan nilai baru tidak menimpa dengan `null`
        $updatedData = array_merge($existingDataArray, array_filter($this->getFormData(), fn($value) => !is_null($value)));

        // Simpan data ke dalam database
        MaklumatPerniagaan::updateOrCreate(
            ['appln_id' => Auth::id()],
            $updatedData
        );        

        return redirect()->route('home');
    }

    protected function getFormData()
    {
        return array_merge(
            ['appln_id' => Auth::id()],
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
