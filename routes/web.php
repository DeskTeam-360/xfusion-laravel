<?php

use App\Http\Controllers\Admin\CompanyController;
use App\Http\Controllers\Admin\LimitLinkController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {

//    $start_date =date('Y-m-d H:i:s');
//    $date = strtotime($start_date);
//    $date = strtotime("+0 week", $date);
//    echo date('Y-m-d H:i:s', $date);

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
        $user = Auth::user();
        $ru = $user->meta->where('meta_key', '=', config('app.wp_prefix', 'wp_') . 'capabilities');
        $role = '';
        foreach ($ru as $r) {
            $role = array_key_first(unserialize($r['meta_value']));
        }
        if ($role=='administrator'){
            return view('admin.index');
        }    else{
            return view('admin.dashboard-company');
        }


    })->name('dashboard');

    Route::middleware([
        'auth', 'checkRole:administrator'
    ])->group(function () {
        Route::resource('company', CompanyController::class)->only('index', 'create', 'edit');
        Route::resource('user', UserController::class)->only('index', 'create', 'edit', 'show');

        Route::resource('course-title', LimitLinkController::class)->only('index','create','edit');

        Route::get('schedule',function (){
            return view('admin.schedule.index');
        })->name('schedule-all');
        Route::get('revitalize',function (){
            return view('admin.revitalize.index');
        })->name('revitalize-all');

        Route::get('/schedule/detail/{user}', [CompanyController::class, 'scheduleUserAdministrator'])->name('schedule-user-administrator');

        Route::get('/course/schedule/generate/', [CompanyController::class, 'courseScheduleGenerate'])->name('course-schedule-generate');
        Route::get('/course/schedule/generate/create', [CompanyController::class, 'courseScheduleGenerateCreate'])->name('course-schedule-generate-create');
        Route::get('/course/schedule/generate/edit/{id}', [CompanyController::class, 'courseScheduleGenerateEdit'])->name('course-schedule-generate-edit');

    });
    Route::get('company/{id}', [CompanyController::class, 'show'])->name('company.show');
    Route::get('/company/{id}/add-employee', [CompanyController::class, 'addEmployee'])->name('company.add-employee');
    Route::get('/company/{id}/edit-employee/{employee}', [CompanyController::class, 'editEmployee'])->name('company.edit-employee');

    Route::get('/company/{id}/progress', [CompanyController::class, 'progress'])->name('company.progress');
    Route::get('/company/{id}/schedule', [CompanyController::class, 'schedule'])->name('company.schedule');
    Route::get('/company/{id}/schedule/create', [CompanyController::class, 'scheduleCreate'])->name('company.schedule-create');

    Route::get('/company/{id}/schedule/{user}', [CompanyController::class, 'scheduleUser'])->name('company.schedule-user');

});


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
