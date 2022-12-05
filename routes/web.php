<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\RegionController;
use App\Http\Controllers\StudentFormController;
use App\Http\Controllers\StudentTableController;
use App\Http\Controllers\CentangController;
use App\Http\Controllers\PendidikController;
use App\Http\Controllers\Pendidik2Controller;

Route::middleware('guest')->group(function () {
    Route::get('/', [AuthController::class, 'index'])->name('login');
    Route::post('/', [AuthController::class, 'authenticate'])->name('authenticate');
});

Route::middleware('auth')->group(function () {
    Route::delete('/logout', [AuthController::class, 'logout'])->name('logout');
});


Route::middleware('isAdmin')->group(function () {
    // Route::get('/welcome-teacher', [PendidikController::class, 'welcome_teacher'])->name('welcome_teacher');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.admin');
    Route::post('/dashboard', [DashboardController::class, 'store'])->name('dashboard.store');

    Route::prefix('/dashboard')->name('dashboard.')->group(function () {
        Route::resources([
            '/regions' => RegionController::class,
            '/grades' => GradeController::class,
            '/input-table' => StudentTableController::class,
            '/activities' => ActivityController::class,
            '/categories' => CategoryController::class,
        ]);

        // StudentTableController@method=akmal
        Route::get('/input-table/activities/{student}', [StudentTableController::class, 'activities'])->name('input-table.activities');

        // json
        Route::get('/input-table/activities/pendidik2/{student}', [StudentTableController::class, 'pendidik2'])->name('input-table.activities.pendidik2');

        Route::resource('/input-form', StudentFormController::class)->parameters([
            'input_form' => 'student'
        ]);

    });
});

Route::get('tes', function(){
    return view('dashboard.input-table.edit', ['input_table' => 'ini tes', 'name' => '']);
});

Route::middleware('isStudent')->group(function () {
    
    // Route::get('/welcome', [PendidikController::class, 'welcome'])->name('welcome');
    Route::get('/student', [DashboardController::class, 'index'])->name('dashboard');
    Route::post('/student', [DashboardController::class, 'store'])->name('dashboard.store');
    Route::prefix('/student')->name('dashboard.')->group(function () {
        Route::resource('pendidik', PendidikController::class);
        // Route::resource('centang', CentangController::class);
        Route::get('/form', [CentangController::class, 'form'])->name('form');                                    
        Route::get('centang', [CentangController::class, 'index'])->name('centang.index');
        Route::post('centang/store', [CentangController::class, 'store'])->name('centang.store');
        Route::resource('pendidik2', Pendidik2Controller::class);
    });

});
