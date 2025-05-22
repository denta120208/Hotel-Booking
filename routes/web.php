<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserBookingController;
use App\Http\Controllers\BookingController;

// Halaman landing awal
Route::get('/', function () {
    return view('welcome');
})->name('welcome');

// Halaman utama user untuk melihat daftar kamar
Route::get('/home', [UserBookingController::class, 'index'])->name('user.home');

// Detail halaman booking per kamar
Route::get('/book/{room}', [UserBookingController::class, 'show'])->name('book.show');

// Formulir booking kamar
// Rute untuk form dan submit booking
Route::get('/booking/{room_id}', [App\Http\Controllers\BookingController::class, 'form'])->name('booking.form');
Route::post('/booking/submit', [App\Http\Controllers\BookingController::class, 'submit'])->name('booking.submit');
Route::get('/booking/{room_id}', [App\Http\Controllers\BookingController::class, 'form'])->name('booking.form');
Route::post('/booking/submit', [App\Http\Controllers\BookingController::class, 'submit'])->name('booking.submit');
Route::get('/booking/confirmation/{id}', [App\Http\Controllers\BookingController::class, 'confirmation'])->name('booking.confirmation');
// routes/web.php
Route::get('/debug/bookings', function() {
    $bookings = DB::table('bookings')->get();
    $rooms = DB::table('rooms')->get();
    
    return [
        'bookings_count' => $bookings->count(),
        'latest_bookings' => $bookings->take(5),
        'rooms_count' => $rooms->count(),
        'database_name' => DB::getDatabaseName(),
    ];
});