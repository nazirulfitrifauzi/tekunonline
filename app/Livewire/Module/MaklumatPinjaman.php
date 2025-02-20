<?php

namespace App\Livewire\Module;

use App\Models\MaklumatPinjaman as ModelsMaklumatPinjaman;
use App\Models\Negeri;
use App\Traits\MaklumatPinjamanValidation;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class MaklumatPinjaman extends Component
{
    use MaklumatPinjamanValidation;

    public $negeriSelection = []; // Pastikan ia sentiasa array

    public function submit()
    {
        // $this->validate();
        
    // Dapatkan data sedia ada dalam database
    $existingData = ModelsMaklumatPinjaman::where('user_id', Auth::id())->first();

    // Jika wujud, gunakan nilai sedia ada, jika tidak, buat array kosong
    $existingDataArray = $existingData ? $existingData->toArray() : [];

    // Gabungkan data lama dengan data baru, tetapi pastikan nilai baru tidak menimpa dengan `null`
    $updatedData = array_merge($existingDataArray, array_filter($this->getFormData(), fn($value) => !is_null($value)));

    // Simpan data ke dalam database
    ModelsMaklumatPinjaman::updateOrCreate(
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


        return view('livewire.module.maklumat-pinjaman');
    }
}
