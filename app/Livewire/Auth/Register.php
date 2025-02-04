<?php

namespace App\Livewire\Auth;

use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use Livewire\Component;

class Register extends Component
{
    /** @var string */
    public $name = '';

    /** @var string */
    public $ic_no = '';

    /** @var string */
    public $email = '';

    /** @var string */
    public $password = '';

    /** @var string */
    public $passwordConfirmation = '';

    public function register()
    {
        $this->validate([
            'name' => ['required'],
            'email' => ['required', 'email', 'unique:users'],
            'ic_no' => [
                'required',
                'unique:users',
                'numeric',
                'digits:12',
                function ($attribute, $value, $fail) {
                    $yearPart = (int) substr($value, 0, 2);
                    $currentYear = (int) date('Y');
                    $currentYearShort = $currentYear % 100;
                    $birthYear = $yearPart <= $currentYearShort ? 2000 + $yearPart : 1900 + $yearPart;
                    $age = $currentYear - $birthYear;

                    if ($age < 18 || $age > 65) {
                        $fail('Anda tidak layak memohon kerana syarat umur mesti berumur 18 tahun dan keatas dan tidak melebihi 60 tahun.');
                    } elseif (substr($value, 2, 2) > 12) {
                        $fail('Sila semak bulan kelahiran di dalam no kad pengenalan anda.');
                    } elseif (substr($value, 4, 2) > 31) {
                        $fail('Sila semak hari kelahiran di dalam no kad pengenalan anda.');
                    }
                }
            ],
            'password' => ['required', 'min:8', 'same:passwordConfirmation'],
        ]);

        $user = User::create([
            'email' => $this->email,
            'name' => $this->name,
            'ic_no' => $this->ic_no,
            'password' => Hash::make($this->password),
        ]);

        event(new Registered($user));

        Auth::login($user, true);

        return redirect()->intended(route('home'));
    }

    public function render()
    {
        return view('livewire.auth.register')->extends('layouts.auth');
    }
}
