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
            $table->timestamp('tanggal')->useCurrent();
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
