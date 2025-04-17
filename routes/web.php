<?php

use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\JopApplicationController;
use App\Http\Controllers\OpportunityController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::resource('/jobs', OpportunityController::class);
Route::resource('applications', JopApplicationController::class);
Route::post('applications/{application}/withdraw', [JopApplicationController::class, 'destroy'])->name('applications.withdraw');
Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::fallback(function () {
    return redirect('jobs');
});
require __DIR__ . '/auth.php';
require __DIR__ . '/admin.php';
