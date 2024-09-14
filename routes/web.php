<?php

use App\Exports\ResultsExport;
use App\Exports\StudentsExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\InformationController;
use App\Http\Controllers\DahboardUserController;
use App\Http\Controllers\DashboardChartController;
use App\Http\Controllers\DashboardUsersController;
use App\Http\Controllers\DashboardValueController;
use App\Http\Controllers\DashboardStudentController;
use App\Http\Controllers\DownloadTemplateController;
use App\Http\Controllers\DashboardCentroidController;
use App\Http\Controllers\DashboardIterationController;
use App\Http\Controllers\DashboardIterationProccessController;
use App\Http\Controllers\DashboardUserController;

Route::get('/', function () {
    return view('homepages.home');
});
Route::get('/information', [InformationController::class, 'index'])->name('information.index');

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');

// Route untuk Tab STUDENTS
Route::resource('/dashboard/students', DashboardStudentController::class)
    ->middleware('auth')
    ->names([
        'index' => 'dashboard.students.index',
        'create' => 'dashboard.students.create',
        'store' => 'dashboard.students.store',
        'show' => 'dashboard.students.show',
        'edit' => 'dashboard.students.edit',
        'update' => 'dashboard.students.update',
        'destroy' => 'dashboard.students.destroy',
    ]);

Route::post('/dashboard/students/import', [DashboardStudentController::class, 'import'])
    ->name('dashboard.students.import');

// Route::get('/dashboard/students/export', [DashboardStudentController::class, 'export']);


//  Route untuk Tab VALUES
Route::resource('/dashboard/values', DashboardValueController::class)
    ->middleware('auth')
    ->parameters(['values' => 'student'])
    ->names([
        'index' => 'dashboard.values.index',
        'show' => 'dashboard.values.show',
        'edit' => 'dashboard.values.edit',
        'update' => 'dashboard.values.update',
    ]);

//  Route untuk Tab CENTROIDS
Route::resource('/dashboard/centroids', DashboardCentroidController::class)
    ->middleware('auth')
    // ->parameters(['centroids' => 'centroids'])
    ->names([
        'index' => 'dashboard.centroids.index',
        'create' => 'dashboard.centroids.create',
        'store' => 'dashboard.centroids.store',
        'show' => 'dashboard.centroids.show',
        'edit' => 'dashboard.centroids.edit',
        'update' => 'dashboard.centroids.update',
        'destroy' => 'dashboard.centroids.destroy',

    ]);


//  Route untuk Tab ITERATIONS
Route::resource('/dashboard/iterations', DashboardIterationController::class)
    ->middleware('auth')
    ->names([
        'index' => 'dashboard.iterations.index',
    ]);

Route::get('/dashboard/iterations/proses/iterasi', [DashboardIterationProccessController::class, 'index'])->middleware('auth')->middleware('auth');

//  Route untuk Tab Grafik
Route::resource('/dashboard/charts', DashboardChartController::class)
    ->middleware('auth')
    ->names([
        'index' => 'dashboard.charts.index',
    ]);


Route::post('/update-account', [DashboardUserController::class, 'updateAccount'])->name('update.account');



// ---------------------------------------------------------------------------- //
// ------------------------- ROUTE DOWNLOAD TEMPLATE -------------------------- //
// ---------------------------------------------------------------------------- //
Route::get('/download/template', [DownloadTemplateController::class, 'downloadTemplate'])->name('download.template');

Route::get('/export-students', function () {
    return Excel::download(new StudentsExport, 'students.xlsx');
})->name('export.students');

Route::get('/export-results', function () {
    return Excel::download(new ResultsExport, 'results.xlsx');
})->name('export.results');
