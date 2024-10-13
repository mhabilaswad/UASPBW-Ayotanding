<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('lapangans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // Menambahkan kolom user_id
            $table->string('full_name'); // Nama lengkap pemilik lapangan
            $table->string('phone_number'); // Nomor ponsel pemilik lapangan
            $table->string('email'); // Email pemilik lapangan
            $table->string('identity_photo'); // Foto identitas pemilik lapangan
            $table->string('ownership_proof'); // Bukti kepemilikan lapangan
            $table->string('payment_option'); // Opsi pembayaran (nomor rekening)
            $table->string('field_name'); // Nama lapangan
            $table->string('location'); // Lokasi lapangan
            $table->unsignedBigInteger('jenis_lapangan_id'); // ID jenis lapangan
            $table->text('description')->nullable(); // Deskripsi lapangan (opsional)
            $table->string('full_address'); // Alamat lengkap lapangan
            $table->string('field_photo'); // Path atau URL foto lapangan
            $table->boolean('approved')->default(false);
            $table->timestamps(); // Waktu pembuatan dan pembaruan
            $table->unsignedBigInteger('layanan_pembayaran_id');
            
            $table->foreign('jenis_lapangan_id')->references('id')->on('jenis_lapangan')->onDelete('cascade');
            $table->foreign('layanan_pembayaran_id')->references('id')->on('layanan_pembayaran')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade'); // Add foreign key constraint
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lapangans');
    }
};

