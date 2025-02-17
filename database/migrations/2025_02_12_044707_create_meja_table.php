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
        Schema::create('meja', function (Blueprint $table) {
            $table->id('id_meja');
            $table->string('no_meja');
            $table->boolean('is_active')->default(true);
            
        });

        Schema::table('orders',function (Blueprint $table) {
            $table->foreignId('id_meja')->nullable()->constrained('meja','id_meja');
        });
        

        DB::table('meja')->insert([
            ['id_meja' => 1, 'no_meja' => 'A01', 'is_active' => 1],
            ['id_meja' => 2, 'no_meja' => 'A02', 'is_active' => 1],
            ['id_meja' => 3, 'no_meja' => 'A03', 'is_active' => 1],
            ['id_meja' => 4, 'no_meja' => 'A04', 'is_active' => 1],
            ['id_meja' => 5, 'no_meja' => 'A05', 'is_active' => 1],
            ['id_meja' => 6, 'no_meja' => 'B01', 'is_active' => 1],
            ['id_meja' => 7, 'no_meja' => 'B02', 'is_active' => 1],
            ['id_meja' => 8, 'no_meja' => 'B03', 'is_active' => 1],
            ['id_meja' => 9, 'no_meja' => 'B04', 'is_active' => 1],
            ['id_meja' => 10, 'no_meja' => 'B05', 'is_active' => 1],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('meja');
    }
};
