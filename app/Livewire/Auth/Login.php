<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Login extends Component
{
    /** @var string */
    public $email = '';

    /** @var string */
    public $password = '';

    /** @var bool */
    public $remember = false;

    public $check;
    public $run;
    public $final_count_attmpt = 1;

    /** @var int */
    protected $loginAttempts = 0;

    protected $rules = [
        'email' => ['required', 'email'],
        'password' => ['required'],
    ];

    // public function authenticate()
    // {
    //     $this->validate();

    //     $this->check = User::where('email',$this->email)->first();

    //     $this->run = DB::select('exec dbo.up_login_rules ?,?,?', [$this->check->id,$this->password,$this->loginAttempts]);
            
    //         //$this->loginAttempts++;
           
    //         $count_attempt = DB::table('failed_login_attempts')->where('email',$this->email)->count();
    //         $set1 = $count_attempt + 1;
           
    //         if($count_attempt < 5){
    //             $this->final_count_attmpt = $set1 + $this->loginAttempts++;
    //         }

    //         if (!Auth::attempt(['email' => $this->email, 'password' => $this->password], $this->remember)) {
    //             // $this->addError('email', trans('auth.failed'))+ 'Percubaan Kata laluan telah capai'+ $this->loginAttempts;
    //             if($this->final_count_attmpt < 5){
    //                 $this->addError(
    //                     'email',
    //                     trans('auth.failed') . ' Percubaan Kata laluan telah capai ' . $this->final_count_attmpt . ' kali!'
    //                 );

    //             }if($this->final_count_attmpt >= 5){
    //                 $this->addError(
    //                     'email',
    //                     trans('auth.failed') . 'Akaun anda telah dikuci,sila hubungi pentadbir sistem!'
    //                 );

    //                 //update table user to update date_login_locked and tot_fail_login_attempt
    //                 User::where('email',$this->email)->update([
    //                     'date_login_locked' => now(),
    //                     'tot_fail_login_attempt' => $this->final_count_attmpt
    //                 ]);
    //             }
                

    //             if($count_attempt < 5){
    //                 $this->storeFailedLoginAttempt();
    //             }

    //             return;
    //         }elseif($this->run[0]->col_1 == 'Y'){
    //                 $this->addError(
    //                     'email',
    //                     trans('auth.failed') . 'Kata laluan sudah tamat tempoh!, Sila kemaskini kata laluan anda.'
    //                 );
    //             return;
    //         }else{
    //                 // Reset login attempts on successful login
    //                 $this->loginAttempts = 0;
                
    //                 DB::table('failed_login_attempts')->where('email',$this->email)->delete();

    //                 return redirect()->route('dashboard');
    //         }

    // }

    public function authenticate()
    {
        // 1. Validate input data (e.g., email/password required)
        $this->validate();

        // 2. Retrieve user by email
        $user = User::where('email', $this->email)->first();
        
        // If user is not found, immediately fail
        if (! $user) {
            $this->addError('email', 'Pengguna tidak wujud atau emel salah.');
            return;
        }

        // 3. Count previous failed attempts for this email
        $failedAttemptsCount = DB::table('failed_login_attempts')
                                ->where('email', $this->email)
                                ->count();

        // 4. Increment final attempt count if less than 5
        if ($failedAttemptsCount < 5) {
            $this->final_count_attmpt = ($failedAttemptsCount + 1) + $this->loginAttempts++;
        } else {
            // If already ≥ 5, just mirror that count or increment if desired
            $this->final_count_attmpt = $failedAttemptsCount + $this->loginAttempts;
        }

        // 5. Attempt to authenticate
        if (! Auth::attempt(['email' => $this->email, 'password' => $this->password], $this->remember)) {
            // If authentication fails, handle the failed attempt
            $this->handleFailedLogin($failedAttemptsCount);
            return;
        }

        //if attempt already 5 times
        if ($failedAttemptsCount >= 5) {
            Auth::logout();
            $this->addError('email', 'Akaun anda telah dikunci, sila hubungi pentadbir sistem!');
            return;
        }

        // 6. Call your custom stored procedure after successful Auth::attempt()
        $loginRules = DB::select('exec dbo.up_login_rules ?, ?, ?', [
            $user->id,
            $this->password,
            $this->loginAttempts,
        ]);

        // 7. Check the stored procedure results

        // If col_1 = 'Y', disallow login / do not redirect
        if ($loginRules[0]->col_1 === 'Y') {
            Auth::logout();  // immediately log them out
            $this->addError('email', 'Kata laluan sudah tamat tempoh! Sila kemaskini kata laluan anda.');
            return;
        }


        // 8. If no flags are triggered: reset login attempts and redirect
        $this->loginAttempts = 0;

       
        // Clear failed attempts for this email
        DB::table('failed_login_attempts')->where('email', $this->email)->delete();

        // Finally, redirect to dashboard
        return redirect()->route('dashboard');
    }

    private function handleFailedLogin(int $failedAttemptsCount)
    {
        // If the total attempts are still under 5, show a warning
        if ($this->final_count_attmpt < 5) {
            $this->addError(
                'email',
                'Kata laluan salah! Percubaan kata laluan sudah capai ' . $this->final_count_attmpt . ' kali.'
            );
        } 
        // Otherwise, lock the account
        else {
            $this->addError(
                'email',
                'Akaun anda telah dikunci, sila hubungi pentadbir sistem!'
            );

            // Update user table to mark the account as locked
            User::where('email', $this->email)->update([
                'date_login_locked'      => now(),
                'tot_fail_login_attempt' => $this->final_count_attmpt,
            ]);
        }

        // Store the failed attempt in DB if user hasn’t hit 5 attempts yet
        if ($failedAttemptsCount < 5) {
            $this->storeFailedLoginAttempt();
        }
    }

    protected function storeFailedLoginAttempt()
    {
        DB::table('failed_login_attempts')->insert([
            'email'         => $this->email,
            'attempt_count' => $this->final_count_attmpt,
            'created_at'    => now(),
        ]);
    }


    public function render()
    {
        return view('livewire.auth.login')->extends('layouts.app');
    }
}
