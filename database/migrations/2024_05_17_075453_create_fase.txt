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
        Schema::create('fase', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('lapangan_id'); // Foreign key to fields table
            $table->time('jam_mulai'); // Jam mulai fase
            $table->time('jam_berakhir'); // Jam berakhir fase
            $table->decimal('harga', 10, 2); // Harga per fase
            $table->timestamps();

            // Add foreign key constraint
            $table->foreign('lapangan_id')->references('id')->on('lapangan')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fase');
    }
};

