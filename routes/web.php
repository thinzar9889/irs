<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\InternController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EvaluationController;
use App\Http\Controllers\InternshipController;
use App\Http\Controllers\UniversityController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\InternReportController;
use App\Http\Controllers\WeeklyReportController;
use App\Http\Controllers\CompanySupervisorController;
use App\Http\Controllers\UniversitySupervisorController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes(['register' => false]);

Route::group(['middleware' => ['auth']], function () {
    Route::get('/dashboard', function () {
        return view('backend.dashboard');
    })->name('dashboard');


    // Company
    Route::resource('companies', CompanyController::class);
    Route::post('delete-company', [CompanyController::class, 'destroy'])->name('delete-company');

    // University
    Route::resource('universities', UniversityController::class);
    Route::post('delete-university', [UniversityController::class, 'destroy'])->name('delete-university');

    // Intern
    Route::resource('interns', InternController::class);
    Route::post('delete-intern', [InternController::class, 'destroy'])->name('delete-intern');

    // Company Supervisor
    Route::resource('company-supervisors', CompanySupervisorController::class);
    Route::post('delete-company-supervisor', [CompanySupervisorController::class, 'destroy'])->name('delete-company-supervisor');

    // University Supervisor
    Route::resource('university-supervisors', UniversitySupervisorController::class);
    Route::post('delete-university-supervisor', [UniversitySupervisorController::class, 'destroy'])->name('delete-university-supervisor');

    // Internship
    Route::resource('internships', InternshipController::class);
    Route::post('delete-internship', [InternshipController::class, 'destroy'])->name('delete-internship');

    // Weekly Report
    Route::resource('weekly-reports', WeeklyReportController::class);
    Route::post('delete-weekly-report', [WeeklyReportController::class, 'destroy'])->name('delete-weekly-report');

    // Intern Report
    Route::resource('intern-reports', InternReportController::class);
    Route::get('export-pdf/{id}', [InternReportController::class, 'exportPdf'])->name('intern-reports.export-pdf');

    //Evaluation
    Route::resource('evaluations', EvaluationController::class);
    Route::post('delete-evaluation', [EvaluationController::class, 'destroy'])->name('delete-evaluation');
    Route::get('exportEvaluation-pdf/{id}', [EvaluationController::class, 'exportEvaluationPdf'])->name('evaluations.exportEvaluation-pdf');

    //  Dashboard
    Route::resource('dashboards', DashboardController::class);
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

    //application
    // Route::get('application/index',[ApplicationController::class,'index'])->name('application.index');
    // Route::get('application/create',[ApplicationController::class,'create'])->name('applications.create');
    Route::post('applications/create',[ApplicationController::class,'store'])->name('applications.store');
    // Route::get('application/edit/{id}',[ApplicationController::class,'edit'])->name('application.edit');
    // Route::post('application/update/{id}',[ApplicationController::class,'update'])->name('application.update');
    // Route::post('application/delete/{id}',[ApplicationController::class,'delete'])->name('application.delete');

    // application
    Route::resource('application', ApplicationController::class);
    Route::post('delete-application', [ApplicationController::class, 'destroy'])->name('delete-application');

});
