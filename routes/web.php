<?php

use App\Http\Controllers\Admin\CompanyController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
//    $validCharacters = 'abcdefghijklmnopqrstuvwxyz0123456789';
//    $myKeeper = '';
//    $length = 32;
//    for ($n = 1; $n <= $length; $n++) {
//        $whichCharacter = rand(0, strlen($validCharacters) - 1);
//        $myKeeper .= $validCharacters{$whichCharacter};
//    }
//    return $myKeeper;
    return redirect(route('dashboard'));
});

Auth::routes();

Route::middleware([
    'auth'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.index');
    })->name('dashboard');

    Route::middleware([
        'auth', 'checkRole:administrator'
    ])->group(function () {
        Route::resource('company', CompanyController::class)->only('index', 'create', 'edit');
        Route::resource('user', UserController::class)->only('index', 'create', 'edit', 'show');
    });
    Route::get('company/{id}', [CompanyController::class, 'show'])->name('company.show');
    Route::get('/company/{id}/add-employee', [CompanyController::class, 'addEmployee'])->name('company.add-employee');
    Route::get('/company/{id}/progress', [CompanyController::class, 'progress'])->name('company.progress');
    Route::get('/company/{id}/schedule', [CompanyController::class, 'schedule'])->name('company.schedule');
    Route::get('/company/{id}/schedule/create', [CompanyController::class, 'scheduleCreate'])->name('company.schedule-create');
});


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
