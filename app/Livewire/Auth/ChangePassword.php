<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class ChangePassword extends Component
{
    public $current_password;
    public $new_password;
    public $new_password_confirmation;

    protected $rules = [
        'current_password' => 'required',
        'new_password' => 'required|min:8|same:new_password_confirmation',
        'new_password_confirmation' => 'required'
    ];

    protected $messages = [
        'current_password.required' => 'Sila masukkan kata laluan semasa',
        'new_password.required' => 'Sila masukkan kata laluan baru',
        'new_password.min' => 'Kata laluan baru mestilah sekurang-kurangnya 8 aksara',
        'new_password.same' => 'Kata laluan baru dan pengesahan kata laluan tidak sepadan',
        'new_password_confirmation.required' => 'Sila masukkan pengesahan kata laluan'
    ];

    public function updatePassword()
    {
        $this->validate();

        if (!Hash::check($this->current_password, auth()->user()->password)) {
            $this->addError('current_password', 'Kata laluan semasa tidak tepat');
            return;
        }

        $user = Auth::user();
        $user->password = Hash::make($this->new_password);
        $user->save();

        session()->flash('message', 'Kata laluan berjaya dikemaskini');
        
        $this->reset(['current_password', 'new_password', 'new_password_confirmation']);
    }

    public function render()
    {
        return view('livewire.auth.change-password');
    }
} 