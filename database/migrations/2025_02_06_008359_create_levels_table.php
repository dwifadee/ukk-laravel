<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('level', function (Blueprint $table) {
            $table->id('id_level');
            $table->string('nama_level');
        });

        // Insert default roles
        DB::table('level')->insert([
            ['id_level' => 1, 'nama_level' => 'admin'],
            ['id_level' => 2, 'nama_level' => 'kasir'],
            ['id_level' => 3, 'nama_level' => 'waiter'],
            ['id_level' => 4, 'nama_level' => 'owner'],
            ['id_level' => 5, 'nama_level' => 'pelanggan'],
        ]);
    }

    public function down()
    {
        Schema::dropIfExists('level');
    }
};
