<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;

Route::get('/', [ClientController::class, 'index'])->name('home');
Route::get('/events', [ClientController::class, 'events'])->name('events');
Route::get('/event/{id}', [ClientController::class, 'eventDetails'])->name('event.details');
Route::get('/book-ticket/{id}', [ClientController::class, 'bookTicket'])->name('book.ticket');
Route::post('/submit-booking', [ClientController::class, 'submitBooking'])->name('submit.booking');
Route::get('/ticket/{id}', [ClientController::class, 'ticketPreview'])->name('ticket.preview');
Route::get('/ticket/{id}/pdf', [ClientController::class, 'ticketPdf'])->name('ticket.pdf');

// API routes for AJAX
Route::middleware('auth')->group(function () {
    Route::post('/api/bookmark', [ClientController::class, 'toggleBookmark']);
    Route::post('/api/like', [ClientController::class, 'toggleLike']);
});

Route::get('/api/events', [ClientController::class, 'getEvents']);
