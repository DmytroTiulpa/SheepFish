<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\EmployeeController;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/companies', [CompanyController::class, 'index'])->name('companies');
    Route::get('/companies/create', [CompanyController::class, 'create'])->name('companies.create');
    Route::get('/companies/edit', [CompanyController::class, 'edit'])->name('companies.edit');
    Route::post('/companies/store', [CompanyController::class, 'store'])->name('companies.store');
    Route::post('/companies/update/{id}', [CompanyController::class, 'update'])->name('companies.update');
    Route::delete('/companies/delete/{id}', [CompanyController::class, 'destroy'])->name('companies.delete');
    Route::get('/companies/delete_logo/{id}', [CompanyController::class, 'delete_logo'])->name('companies.delete_logo');

    Route::get('/employees', [EmployeeController::class, 'index'])->name('employees');
    Route::get('/employees/create', [EmployeeController::class, 'create'])->name('employees.create');
    Route::get('/employees/edit', [EmployeeController::class, 'edit'])->name('employees.edit');
    Route::post('/employees/store', [EmployeeController::class, 'store'])->name('employees.store');
    Route::post('/employees/update/{id}', [EmployeeController::class, 'update'])->name('employees.update');
    Route::delete('/employees/delete/{id}', [EmployeeController::class, 'destroy'])->name('employees.delete');
});
