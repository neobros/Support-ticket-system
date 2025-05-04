<?php

use App\Http\Controllers\Agent\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\TicketController;
use App\Http\Controllers\Agent\AgentController;
use App\Http\Middleware\CheckAgentMiddleware;

//--------------User---------------------------------
Route::get('/', [TicketController::class, 'create'])->name('/');
Route::post('/submit-ticket', [TicketController::class, 'store'])->name('store');
Route::get('/ticket-status', [TicketController::class, 'checkStatus'])->name('checkStatus');
Route::post('/ticket-status', [TicketController::class, 'viewStatus'])->name('viewStatus');


//--------------Agent---------------------------------
Route::middleware([CheckAgentMiddleware::class])->group(function () {
    //AgentController
    Route::get('/dashboard', [AgentController::class, 'index'])->name('dashboard');
    Route::get('/ticket/{id}', [AgentController::class, 'show']);
    Route::post('/ticket/{id}/reply', [AgentController::class, 'reply']);

    //ProfileController
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__.'/auth.php';
