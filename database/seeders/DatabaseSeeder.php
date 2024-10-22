<?php

namespace Database\Seeders;

use App\Models\Account;
use App\Models\PotentialProblem;
use App\Models\ProblemDomain;
use App\Models\ProjectMenu;
use App\Models\Projects;
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
         * Project Seeder
         */
        $projects = [
            ['project_name'=>'ELIS (Employee Leave Information System)', 'project_desc' => 'ELIS APPS', 'business_process_model'=> '2XNKXEy8aaxjwh2PgtD8mqk9CsMCL38dosPbT8JY.png', 'problem_root_cause'=> ' 5ZW63LaAJ3DXduuphMxo9bgMtd4St5n2xAs2tkGK.png'],
            ['project_name'=>'Nusantara Project OS', 'project_desc' => 'Nusantara OS', 'business_process_model'=> '2XNKXEy8aaxjwh2PgtD8mqk9CsMCL38dosPbT8JY.png', 'problem_root_cause'=> ' 5ZW63LaAJ3DXduuphMxo9bgMtd4St5n2xAs2tkGK.png'],
        ];
        foreach ($projects as $pj) {
            Projects::create($pj);
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

        /**
         * MARK:Potential Problem
         */
        $potentialProblem = [
            ['potential_name' => 'Ambiguity'],
            ['potential_name' => 'Incomplete'],
            ['potential_name' => 'Inconsisten'],
        ];
        foreach($potentialProblem as $potention){
            PotentialProblem::create($potention);
        }
        /**
         * MARK:Problem Domain
         */
        $problemDomain = [
            ['problem_name' => 'Employees need to request a leave online','project_id' => 1],
            ['problem_name' => 'Employees need to track history leave','project_id' => 1],
            ['problem_name' => 'Supervisor need to accept or reject subordinates leave request','project_id' => 1],
            ['problem_name' => 'Supervisor need to track their subordinates leave history','project_id' => 1],
            ['problem_name' => 'HR need to accept or reject all employees leave after accepted by supervisor','project_id' => 1],
            ['problem_name' => 'Supervisor need to track their all employees leave history','project_id' => 1],
            ['problem_name' => 'Supervisor need to track their all employees leave history','project_id' => 1],
            ['problem_name' => 'Supervisor need to be notified by email if any leave request from subordinate','project_id' => 1],
            ['problem_name' => 'Employees need to be notified by email if any approval from their supervisor','project_id' => 1],
            ['problem_name' => 'HR need to be notified by email if any approved request from supervisor','project_id' => 1],
            ['problem_name' => 'Employees need to be notified by email if any approval from their HR','project_id' => 1],
        ];
        foreach ($problemDomain as $pd){
            ProblemDomain::create($pd);
        }

        /**
         * MARK: Solution Domain
         */
        $solutionDomain = [
            ['project_id' =>  1, 'solution_desc' => 'The system must be able to allow the employee to create a leave request directly inside the system without call supervisor first', 'type_solution'=>'Functionality', 'solution_revision'=>'The system must be able to allow the employee to create a leave request directly inside the system without call supervisor first'],
            ['project_id' =>  1, 'solution_desc' => 'The system must be able to fit into mobile devices (responsive web design)', 'type_solution'=>'Usability', 'solution_revision'=>'The system must be able to fit into mobile devices (responsive web design)'],
            ['project_id' =>  1, 'solution_desc' => 'The system must be able to provide the availability with minimum at 99%', 'type_solution'=>'Reliability', 'solution_revision'=>'The system must be able to provide the availability with minimum at 99%'],
            ['project_id' =>  1, 'solution_desc' => 'The system response time must be less than 5 seconds', 'type_solution'=>'Performance', 'solution_revision'=>'The system response time must be less than 5 seconds'],
            ['project_id' =>  1, 'solution_desc' => 'The system codebase is developed by Service Oriented Architecture', 'type_solution'=>'Supportability', 'solution_revision'=>'The system codebase is developed by Service Oriented Architecture'],
            ['project_id' =>  1, 'solution_desc' => 'The system must be delivered by the deadline', 'type_solution'=>'Design & Implementation Constraint', 'solution_revision'=>'The system must be delivered by the deadline'],
        ];
        foreach ($solutionDomain as $sd){
            SolutionDomains::create($sd);
        }
    }
}
