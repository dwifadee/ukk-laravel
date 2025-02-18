<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('user')->insert([
            [
                'id_user' => 1,
                'username' => 'admin',
                'password' => bcrypt('admin123'),
                'nama_user' => 'admin',
                'id_level' => 1,

            ],
            [
                'id_user' => 2,
                'username' => 'waiter',
                'password' => bcrypt('waiter123'),
                'nama_user' => 'waiter',
                'id_level' => 2,
            ],
            [
                'id_user' => 3,
                'username' => 'kasir',
                'password' => bcrypt('kasir123'),
                'nama_user' => 'kasir',
                'id_level' => 3,

            ],
            [
                'id_user' => 4,
                'username' => 'owner',
                'password' => bcrypt('owner123'),
                'nama_user' => 'owner',
                'id_level' => 4,

            ],
            [
                'id_user' => 5,
                'username' => 'user',
                'password' => bcrypt('user123'),
                'nama_user' => 'pelanggan',
                'id_level' => 5,
            ],
        ]);
    }
}
