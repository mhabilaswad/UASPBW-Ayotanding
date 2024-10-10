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
        Schema::create('pembayaran', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('lapangan_id');
            $table->unsignedBigInteger('fase_id');
            $table->date('booking_date');
            $table->decimal('total_price', 10, 2);
            $table->timestamps();

            // Kolom tambahan
            $table->string('bukti_pembayaran')->nullable();
            $table->timestamp('payment_date')->nullable();
            $table->string('full_name');
            $table->string('phone_number');
            $table->string('email');

            // Foreign keys
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('lapangan_id')->references('id')->on('lapangan')->onDelete('cascade');
            $table->foreign('fase_id')->references('id')->on('fase')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembayaran');
    }
};
