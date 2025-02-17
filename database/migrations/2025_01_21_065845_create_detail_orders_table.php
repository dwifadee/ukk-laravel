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
        Schema::create('detail_orders', function (Blueprint $table) {
            $table->id('id_detail_order');
            $table->unsignedBigInteger('id_order');
            $table->unsignedBigInteger('id_masakan');
            $table->string('keterangan');
            $table->foreign('id_masakan')->references('id_masakan')->on('masakans')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('detail_orders', function (Blueprint $table) {
            $table->dropForeign(['id_masakan']);
            // Uncomment the below line if `id_order` has a foreign key:
            // $table->dropForeign(['id_order']);
        });
        Schema::dropIfExists('detail_orders');
    }
};
