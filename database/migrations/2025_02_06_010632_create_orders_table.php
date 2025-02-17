<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id('id_order');
            $table->decimal('total_harga', 10 , 2);
            $table->string('nama_pemesan')->nullable();
            $table->enum('status_pesanan', ['pending', 'selesai', 'batal'])->default('pending');
            $table->foreignId('id_user')->constrained('user', 'id_user')->onDelete('cascade'); 
            $table->foreignId('id_meja')->nullable()->constrained('meja', 'id_meja')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
