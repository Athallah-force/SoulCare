<?php

use Illuminate\Support\Facades\Route;

// AUTH & DASHBOARD
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;

// BOOKING
use App\Http\Controllers\Client\BookingController;
use App\Http\Controllers\Client\ClientHistoryController;

// CLIENT & PROFESSIONAL FEATURES
use App\Http\Controllers\Client\AvailabilityController as ClientAvailabilityController;
use App\Http\Controllers\Professional\AvailabilityController as ProfessionalAvailabilityController;
use App\Http\Controllers\Professional\ClinicalHistoryController;
use App\Http\Controllers\Professional\ClinicalNoteController;

// ADMIN CONTROLLERS
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminClientController;
use App\Http\Controllers\Admin\AdminProfessionalController;


// -----------------------------------------------------------
// REDIRECT HOME
// -----------------------------------------------------------
Route::get('/', function () {
    return redirect()->route('register');
});


// -----------------------------------------------------------
// AUTHENTICATION
// -----------------------------------------------------------
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


// -----------------------------------------------------------
// MAIN DASHBOARD (Client / Professional)
// -----------------------------------------------------------
Route::middleware('auth')->get('/dashboard', [DashboardController::class, 'index']);


// -----------------------------------------------------------
// BOOKING SYSTEM
// -----------------------------------------------------------
Route::middleware('auth')->group(function () {
    Route::get('/booking', [BookingController::class, 'index']);
    Route::get('/booking/{professional_id}', [BookingController::class, 'showSlots']);
    Route::post('/booking/{professional_id}/create', [BookingController::class, 'createSession']);
});


// -----------------------------------------------------------
// HISTORY (Client)
// -----------------------------------------------------------
Route::middleware('auth')->group(function () {
    Route::get('/history/sessions', [ClientHistoryController::class, 'sessions'])->name('history.sessions');
    Route::get('/history/transactions', [ClientHistoryController::class, 'transactions'])->name('history.transactions');
});


// -----------------------------------------------------------
// CLIENT AREA
// -----------------------------------------------------------
Route::middleware(['auth', 'role:client'])->group(function () {
    Route::get('/client/availability', [ClientAvailabilityController::class, 'index'])
        ->name('client.availability');
});


// -----------------------------------------------------------
// PROFESSIONAL AREA
// -----------------------------------------------------------
Route::middleware(['auth', 'role:professional'])->group(function () {

    // Availability
    Route::get('/professional/availability', [ProfessionalAvailabilityController::class, 'index'])
        ->name('professional.availability');

    Route::get('/professional/availability/create', [ProfessionalAvailabilityController::class, 'create'])
        ->name('professional.availability.create');

    Route::post('/professional/availability', [ProfessionalAvailabilityController::class, 'store'])
        ->name('professional.availability.store');

    Route::delete('/professional/availability/{id}', [ProfessionalAvailabilityController::class, 'destroy'])
        ->name('professional.availability.destroy');


    // Clinical History
    Route::get('/professional/clinical-history', [ClinicalHistoryController::class, 'index'])
        ->name('professional.clinical.history');

    Route::get('/professional/clinical-history/{sessionId}', [ClinicalHistoryController::class, 'show'])
        ->name('professional.clinical.history.show');
});

// Clinical Notes (professional)
Route::middleware(['auth', 'role:professional'])->prefix('professional')->group(function () {

    Route::get('/notes', [ClinicalNoteController::class, 'index'])->name('professional.notes.index');
    Route::get('/notes/create/{appointmentId?}', [ClinicalNoteController::class, 'create'])->name('professional.notes.create');
    Route::post('/notes/store', [ClinicalNoteController::class, 'store'])->name('professional.notes.store');
    Route::get('/notes/{id}', [ClinicalNoteController::class, 'show'])->name('professional.notes.show');

});


// -----------------------------------------------------------
// ADMIN AREA
// -----------------------------------------------------------
Route::middleware(['auth', 'role:Admin'])->prefix('admin')->group(function () {

    // Dashboard
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');

    // Client CRUD
    Route::get('/clients', [AdminClientController::class, 'index'])->name('admin.clients.index');
    Route::get('/clients/create', [AdminClientController::class, 'create'])->name('admin.clients.create');
    Route::post('/clients', [AdminClientController::class, 'store'])->name('admin.clients.store');
    Route::get('/clients/{id}/edit', [AdminClientController::class, 'edit'])->name('admin.clients.edit');
    Route::put('/clients/{id}', [AdminClientController::class, 'update'])->name('admin.clients.update');
    Route::delete('/clients/{id}', [AdminClientController::class, 'destroy'])->name('admin.clients.destroy');

    // Professional CRUD
    Route::get('/professionals', [AdminProfessionalController::class, 'index'])->name('admin.professionals.index');
    Route::get('/professionals/create', [AdminProfessionalController::class, 'create'])->name('admin.professionals.create');
    Route::post('/professionals', [AdminProfessionalController::class, 'store'])->name('admin.professionals.store');
    Route::get('/professionals/{id}/edit', [AdminProfessionalController::class, 'edit'])->name('admin.professionals.edit');
    Route::put('/professionals/{id}', [AdminProfessionalController::class, 'update'])->name('admin.professionals.update');
    Route::delete('/professionals/{id}', [AdminProfessionalController::class, 'destroy'])->name('admin.professionals.destroy');

    // Verification
    Route::get('/professionals/verify', [AdminProfessionalController::class, 'verifyList'])->name('admin.professionals.verify');
    Route::post('/professionals/{id}/verify', [AdminProfessionalController::class, 'verifyProcess'])->name('admin.professionals.verify.process');

    
    // Daftar profesional yang pending verifikasi
    Route::get('/professional/pending', [AdminProfessionalController::class, 'pending'])
        ->name('admin.professional.pending');

    // Detail profil profesional
    Route::get('/professional/{id}', [AdminProfessionalController::class, 'detail'])
        ->name('admin.professional.detail');


    // Tolak profesional
    Route::post('/professional/{id}/reject', [AdminProfessionalController::class, 'reject'])
        ->name('admin.professional.reject');
});
