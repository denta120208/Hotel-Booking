<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class FixBookingsTable extends Migration
{
    public function up()
    {
        // Cek apakah tabel bookings sudah ada
        if (Schema::hasTable('bookings')) {
            // Cek kolom yang mungkin belum ada
            Schema::table('bookings', function (Blueprint $table) {
                if (!Schema::hasColumn('bookings', 'room_id')) {
                    $table->foreignId('room_id')->constrained()->onDelete('cascade');
                }
                if (!Schema::hasColumn('bookings', 'name')) {
                    $table->string('name');
                }
                if (!Schema::hasColumn('bookings', 'email')) {
                    $table->string('email');
                }
                if (!Schema::hasColumn('bookings', 'phone')) {
                    $table->string('phone');
                }
                if (!Schema::hasColumn('bookings', 'check_in')) {
                    $table->date('check_in');
                }
                if (!Schema::hasColumn('bookings', 'check_out')) {
                    $table->date('check_out');
                }
            });
        } else {
            // Buat tabel jika belum ada
            Schema::create('bookings', function (Blueprint $table) {
                $table->id();
                $table->foreignId('room_id')->constrained()->onDelete('cascade');
                $table->string('name');
                $table->string('email');
                $table->string('phone');
                $table->date('check_in');
                $table->date('check_out');
                $table->timestamps();
            });
        }
    }

    public function down()
    {
        // Biarkan kosong atau tambahkan rollback jika perlu
    }
}