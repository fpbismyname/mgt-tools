<?php

namespace Database\Seeders;

use App\Models\Account;
use App\Models\ProjectMenu;
use App\Models\SolutionDomains;
use App\Models\TypeSolution;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /**
         * //MARK:Account Seeder
         */
        $AccountSeeder = [
            [
                'nama_lengkap' => 'Fajar',
                'email' => 'fajar@gmail.com',
                'password' => bcrypt('fajar123'),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nama_lengkap' => 'User',
                'email' => 'user@gmail.com',
                'password' => bcrypt('mgt123'),
                'created_at' => now(),
                'updated_at' => now()
            ]
        ];
        foreach ($AccountSeeder as $account) {
            Account::create($account);
        }

        /**
         * //MARK:Project menu Seeder
         */
        $ProjectMenuSeeder = [
            ['menu' => 'Project Description'],
            ['menu' => 'Problem Domain'],
            ['menu' => 'Solution Domain'],
            ['menu' => 'Potential Problem'],
            ['menu' => 'Requirement Revision'],
            ['menu' => 'Need vs Feat'],
            ['menu' => 'Priority Clasification'],
            ['menu' => 'Feasibility'],
            ['menu' => 'Finalization'],
            ['menu' => 'Use Case'],
            ['menu' => 'Use Case vs Actor'],
            ['menu' => 'Use Case vs Feat']
        ];
        foreach ($ProjectMenuSeeder as $menu) {
            ProjectMenu::create($menu);
        }

        /**
         * //MARK:Type Solution
         */
        $TypeSolution = [
            ['type_name' => 'Functionality'],
            ['type_name' => 'Usability'],
            ['type_name' => 'Reliability'],
            ['type_name' => 'Performance'],
            ['type_name' => 'Supportability'],
            ['type_name' => 'Design & Implementation Constraint'],
        ];
        foreach ($TypeSolution as $typeName) {
            TypeSolution::create($typeName);
        }
    }
}
