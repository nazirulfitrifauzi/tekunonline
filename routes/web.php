<?php

use App\Http\Controllers\Auth\EmailVerificationController;
use App\Http\Controllers\Auth\LogoutController;
use App\Livewire\Auth\Login;
use App\Livewire\Auth\Passwords\Confirm;
use App\Livewire\Auth\Passwords\Email;
use App\Livewire\Auth\Passwords\Reset;
use App\Livewire\Auth\Register;
use App\Livewire\Auth\Verify;
use App\Livewire\Dashboard;
use App\Livewire\Home;
use App\Livewire\Module\MaklumatAkaun;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use App\Livewire\Auth\ChangePassword;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::middleware('guest')->group(function () {
    Route::get('/', function () {
        return auth()->check() ? redirect()->route('home') : redirect()->route('login');
    });

    Route::get('login', Login::class)
        ->name('login');

    Route::get('register', Register::class)
        ->name('register');
});

Route::get('password/reset', Email::class)
    ->name('password.request');

Route::get('password/reset/{token}', Reset::class)
    ->name('password.reset');

Route::middleware('auth')->group(function () {
    Route::get('password/confirm', Confirm::class)
        ->name('password.confirm');

});

Route::middleware('auth')->group(function () {
    //Route::get('/home', Home::class)->name('home');
    // Note the {appln_id?} – the question mark makes it optional in case you want to allow /home without a parameter
    Route::get('/home/{appln_id}', Home::class)->name('home');
    Route::get('/dashboard', Dashboard::class)->name('dashboard');
    Route::get('/maklumat-akaun', MaklumatAkaun::class)->name('maklumat-akaun');
    
    Route::post('logout', LogoutController::class)
        ->name('logout');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/change-password', ChangePassword::class)->name('change-password');

    Route::get('/email/verify', function () {
        return view('auth.verify-email');
    })->name('verification.notice');

    Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
        $request->fulfill();
        return redirect()->route('home')->with('status', 'Email verified successfully!');
    })->middleware(['signed'])->name('verification.verify');

    Route::post('/email/verification-notification', function (Request $request) {
        $request->user()->sendEmailVerificationNotification();
        return back()->with('status', 'Verification link sent!');
    })->middleware(['throttle:6,1'])->name('verification.send');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/home', Home::class)->name('home');
    Route::get('/dashboard', Dashboard::class)->name('dashboard');
    Route::get('/maklumat-akaun', MaklumatAkaun::class)->name('maklumat-akaun');
});

