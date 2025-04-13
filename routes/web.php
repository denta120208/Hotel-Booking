<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserBookingController;
use App\Http\Controllers\BookingController;

// Halaman utama menampilkan daftar room
Route::get('/', [UserBookingController::class, 'index']);

// Menampilkan detail room
Route::get('/book/{room}', [UserBookingController::class, 'show'])->name('book.show');

// Form booking dari room tertentu
Route::get('/booking/form/{room_id}', [BookingController::class, 'form'])->name('booking.form');

// Submit booking form
Route::post('/booking/submit', [BookingController::class, 'submit'])->name('booking.submit');
