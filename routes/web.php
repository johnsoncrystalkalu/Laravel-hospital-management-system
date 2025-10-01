<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;


Route::get('/', [UserController::class, 'index'])->name('index');

Route::get('/dashboard', [UserController::class, 'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/all-doctors', [UserController::class, 'allDoctors'])->name('all.doctors');
Route::post('/appointment', [UserController::class, 'makeAppointment'])->name('appointment');

Route::middleware('auth', 'admin')->group(function () {
    Route::get('add-doctors', [AdminController::class, 'addDoctors'])->name('add.doctors');
    Route::get('view-appointment', [AdminController::class, 'viewAppointments'])->name('view.appointments');
Route::post('post-add-doctor', [AdminController::class, 'postAddDoctors'])->name('post.adddoctors');
Route::get('view-doctors', [AdminController::class, 'viewDoctors'])->name('view.doctors');
Route::get('delete-doctor/{id}', [AdminController::class, 'deleteDoctor'])->name('delete.doctor');
Route::get('update-doctor/{id}', [AdminController::class, 'updateDoctor'])->name('update.doctor');
Route::post('edit-add-doctor/{id}', [AdminController::class, 'editAddDoctors'])->name('edit.adddoctors');
Route::post('change-status/{id}', [AdminController::class, 'changeStatus'])->name('change.status');

});




Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
