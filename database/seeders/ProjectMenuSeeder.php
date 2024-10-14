<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProjectMenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('project_menus')->insert([
            'menu'=>'Project Description',
        ]);
        DB::table('project_menus')->insert([
            'menu'=>'Problem Domain',
        ]);
        DB::table('project_menus')->insert([
            'menu'=>'Solution Domain',
        ]);
        DB::table('project_menus')->insert([
            'menu'=>'Potential Problem',
        ]);
        DB::table('project_menus')->insert([
            'menu'=>'Requirement Revision',
        ]);
        DB::table('project_menus')->insert([
            'menu'=>'Need vs Feat',
        ]);
        DB::table('project_menus')->insert([
            'menu'=>'Priority Clasification',
        ]);
        DB::table('project_menus')->insert([
            'menu'=>'Feasibility',
        ]);
        DB::table('project_menus')->insert([
            'menu'=>'Finalization',
        ]);
        DB::table('project_menus')->insert([
            'menu'=>'Use Case',
        ]);
        DB::table('project_menus')->insert([
            'menu'=>'Use Case vs Actor',
        ]);
        DB::table('project_menus')->insert([
            'menu'=>'Use Case vs Feat',
        ]);
    }
}
