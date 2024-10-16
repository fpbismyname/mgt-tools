<?php

namespace Database\Seeders;

use App\Models\Account;
use App\Models\ProjectMenu;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Account seeder
        Account::create([
            'nama_lengkap'=> 'Fajar',
            'email' => 'fajar@gmail.com',
            'password' => bcrypt('fajar123'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        Account::create([
            'nama_lengkap'=> 'User',
            'email' => 'user@gmail.com',
            'password' => bcrypt('mgt123'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        //project Menu Seeder
        ProjectMenu::create([
            'menu'=>'Project Description',
        ]);
        ProjectMenu::create([
            'menu'=>'Problem Domain',
        ]);
        ProjectMenu::create([
            'menu'=>'Solution Domain',
        ]);
        ProjectMenu::create([
            'menu'=>'Potential Problem',
        ]);
        ProjectMenu::create([
            'menu'=>'Requirement Revision',
        ]);
        ProjectMenu::create([
            'menu'=>'Need vs Feat',
        ]);
        ProjectMenu::create([
            'menu'=>'Priority Clasification',
        ]);
        ProjectMenu::create([
            'menu'=>'Feasibility',
        ]);
        ProjectMenu::create([
            'menu'=>'Finalization',
        ]);
        ProjectMenu::create([
            'menu'=>'Use Case',
        ]);
        ProjectMenu::create([
            'menu'=>'Use Case vs Actor',
        ]);
        ProjectMenu::create([
            'menu'=>'Use Case vs Feat',
        ]);
    }
}
