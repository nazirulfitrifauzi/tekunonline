<?php

namespace App\Livewire\Auth\Passwords;

use App\Providers\RouteServiceProvider;
use Livewire\Component;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;

class Reset extends Component
{
    /** @var string */
    public $token;

    /** @var string */
    public $email;

    /** @var string */
    public $password;

    /** @var string */
    public $passwordConfirmation;

    public function mount($token)
    {
        $this->email = request()->query('email', '');
        $this->token = $token;
    }

    // public function resetPassword()
    // {
    //     $this->validate([
    //         'token' => 'required',
    //         'email' => 'required|email',
    //         'password' => 'required|min:8|same:passwordConfirmation',
    //     ]);

    //     $response = $this->broker()->reset(
    //         [
    //             'token' => $this->token,
    //             'email' => $this->email,
    //             'password' => $this->password
    //         ],
    //         function ($user, $password) {
    //             $user->password = Hash::make($password);

    //             $user->setRememberToken(Str::random(60));

    //             $user->save();

    //             event(new PasswordReset($user));

    //             $this->guard()->login($user);
    //         }
    //     );

    //     if ($response == Password::PASSWORD_RESET) {
    //         session()->flash(trans($response));

    //         return redirect(route('home'));
    //     }

    //     $this->addError('email', trans($response));
    // }

    public function resetPassword()
    {
        $this->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => [
                'required',
                'min:8',
                'same:passwordConfirmation',
                function ($attribute, $value, $fail) {
                    // Check for alphabets (lowercase and uppercase)
                    if (!preg_match('/[a-zA-Z]/', $value)) {
                        $fail('Password must contain at least one alphabetic character.');
                    }

                    // Check for numbers
                    if (!preg_match('/[0-9]/', $value)) {
                        $fail('Password must contain at least one numeric character.');
                    }

                    // Check for special symbols (non-alphanumeric)
                    if (!preg_match('/[^a-zA-Z0-9]/', $value)) {
                        $fail('Password must contain at least one special character.');
                    }
                },
            ],
        ]);

        $response = $this->broker()->reset(
            [
                'token' => $this->token,
                'email' => $this->email,
                'password' => $this->password
            ],
            function ($user, $password) {
                $user->password = Hash::make($password);

                $user->setRememberToken(Str::random(60));

                $user->last_pwd_changed = now()->addDays(30);

                $user->save();

                event(new PasswordReset($user));

                $this->guard()->login($user);
            }
        );

        if ($response == Password::PASSWORD_RESET) {
            session()->flash(trans($response));

            return redirect(route('dashboard'));
        }

        $this->addError('email', trans($response));
    }


    /**
     * Get the broker to be used during password reset.
     *
     * @return \Illuminate\Contracts\Auth\PasswordBroker
     */
    public function broker()
    {
        return Password::broker();
    }

    /**
     * Get the guard to be used during password reset.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard();
    }

    public function render()
    {
        return view('livewire.auth.passwords.reset')->extends('layouts.auth');
    }
}
