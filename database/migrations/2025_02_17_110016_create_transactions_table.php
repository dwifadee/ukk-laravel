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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_order')->constrained('orders', 'id_order')->onDelete('cascade');
            $table->enum('metode_pembayaran', ['tunai', 'rekening', 'ewallet']);
            $table->enum('status_pembayaran', ['tertunda', 'selesai', 'batal'])->default('tertunda');
            $table->decimal('total_bayar', 10, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
