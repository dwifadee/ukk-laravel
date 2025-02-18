<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LevelSeeder extends Seeder
{
    public function run()
    {
        DB::table('level')->delete();

        DB::statement("ALTER TABLE level AUTO_INCREMENT = 1");

        DB::table('level')->insert([
            ['id_level' => 1, 'nama_level' => 'admin'],
            ['id_level' => 2, 'nama_level' => 'waiter'],
            ['id_level' => 3, 'nama_level' => 'kasir'],
            ['id_level' => 4, 'nama_level' => 'owner'],
            ['id_level' => 5, 'nama_level' => 'pelanggan'],
        ]);
    }
}

