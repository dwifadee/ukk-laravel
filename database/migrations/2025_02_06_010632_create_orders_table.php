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
            $table->unsignedBigInteger('id_user');

            $table->foreign('id_user')->references('id_user')->on('user')->onDelete('cascade');
            
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
