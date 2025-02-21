<?php

namespace App\Livewire\Module;

use App\Models\MaklumatPinjaman;
use App\Traits\PinjamanTemanValidation;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class PinjamanTeman extends Component
{

    use PinjamanTemanValidation;

    public function submit()
    {
        // $this->validate();
        
        // Dapatkan data sedia ada dalam database
        $existingData = MaklumatPinjaman::where('user_id', Auth::id())->first();

        // Jika wujud, gunakan nilai sedia ada, jika tidak, buat array kosong
        $existingDataArray = $existingData ? $existingData->toArray() : [];

        // Gabungkan data lama dengan data baru, tetapi pastikan nilai baru tidak menimpa dengan `null`
        $updatedData = array_merge($existingDataArray, array_filter($this->getFormData(), fn($value) => !is_null($value)));

        // Simpan data ke dalam database
        MaklumatPinjaman::updateOrCreate(
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
                ->toArray()
        );
    }
    
    public function render()
    {
    return view('livewire.module.pinjaman-teman');
    }
}
