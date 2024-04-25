<?php

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
});



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
