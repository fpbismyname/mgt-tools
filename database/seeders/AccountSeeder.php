<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('accounts')->insert([
            'nama_lengkap'=> 'Fajar',
            'email' => 'fajar@gmail.com',
            'password' => bcrypt('fajar123'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
