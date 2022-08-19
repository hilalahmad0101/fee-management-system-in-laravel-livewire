<?php

use App\Http\Livewire\Admin\Course;
use App\Http\Livewire\Admin\Dashboard;
use App\Http\Livewire\Admin\Fee;
use App\Http\Livewire\Admin\Payment;
use App\Http\Livewire\Admin\PaymentReport;
use App\Http\Livewire\Admin\Student;
use App\Http\Livewire\Auth\Login;
use App\Http\Livewire\StudentFee;
use Illuminate\Support\Facades\Route;

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

Route::middleware(['guest'])->group(function () {
    Route::get('/', Login::class)->name('login');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', Dashboard::class)->name('dashboard');
    Route::get('/student', Student::class)->name('student');
    Route::get('/course', Course::class)->name('course');
    Route::get('/fees', Fee::class)->name('fee');
    Route::get('/student-fees', StudentFee::class)->name('student-fee');
    Route::get('/payment', Payment::class)->name('payment');
    Route::get('/payment-report', PaymentReport::class)->name('payment-report');
});
