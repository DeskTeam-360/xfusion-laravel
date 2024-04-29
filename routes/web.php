<?php

use App\Http\Controllers\Admin\CompanyController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect(route('dashboard'));
});

Auth::routes();

Route::middleware([
    'auth',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.index');
    })->name('dashboard');

    Route::resource('company', CompanyController::class)->only('index','create','edit');
});



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
