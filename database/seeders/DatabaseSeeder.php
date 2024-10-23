<?php

namespace Database\Seeders;

use App\Models\Account;
use App\Models\EliminatedSolutionRank;
use App\Models\PotentialProblem;
use App\Models\ProblemDomain;
use App\Models\ProjectMenu;
use App\Models\Projects;
use App\Models\SolutionClassification;
use App\Models\SolutionDomains;
use App\Models\SolutionFeasibility;
use App\Models\SolutionPriority;
use App\Models\SolutionRisk;
use App\Models\TypeSolution;
use App\Models\UseCase;
use App\Models\UseCaseActor;
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
            ['project_name' => 'ELIS (Employee Leave Information System)', 'project_desc' => 'ELIS APPS', 'business_process_model' => '2XNKXEy8aaxjwh2PgtD8mqk9CsMCL38dosPbT8JY.png', 'problem_root_cause' => ' 5ZW63LaAJ3DXduuphMxo9bgMtd4St5n2xAs2tkGK.png'],
            ['project_name' => 'Nusantara Project OS', 'project_desc' => 'Nusantara OS', 'business_process_model' => '2XNKXEy8aaxjwh2PgtD8mqk9CsMCL38dosPbT8JY.png', 'problem_root_cause' => ' 5ZW63LaAJ3DXduuphMxo9bgMtd4St5n2xAs2tkGK.png'],
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
        foreach ($potentialProblem as $potention) {
            PotentialProblem::create($potention);
        }
        /**
         * MARK:Problem Domain
         */
        $problemDomain = [
            ['problem_name' => 'Employees need to request a leave online', 'project_id' => 1],
            ['problem_name' => 'Employees need to track history leave', 'project_id' => 1],
            ['problem_name' => 'Supervisor need to accept or reject subordinates leave request', 'project_id' => 1],
            ['problem_name' => 'Supervisor need to track their subordinates leave history', 'project_id' => 1],
            ['problem_name' => 'HR need to accept or reject all employees leave after accepted by supervisor', 'project_id' => 1],
            ['problem_name' => 'Supervisor need to track their all employees leave history', 'project_id' => 1],
            ['problem_name' => 'Supervisor need to track their all employees leave history', 'project_id' => 1],
            ['problem_name' => 'Supervisor need to be notified by email if any leave request from subordinate', 'project_id' => 1],
            ['problem_name' => 'Employees need to be notified by email if any approval from their supervisor', 'project_id' => 1],
            ['problem_name' => 'HR need to be notified by email if any approved request from supervisor', 'project_id' => 1],
            ['problem_name' => 'Employees need to be notified by email if any approval from their HR', 'project_id' => 1],
        ];
        foreach ($problemDomain as $pd) {
            ProblemDomain::create($pd);
        }

        /**
         * MARK: Solution Domain
         */
        $solutionDomain = [
            ['project_id' =>  1, 'solution_desc' => 'The system must be able to allow the employee to create a leave request', 'type_solution' => 'Functionality', 'solution_revision' => 'The system must be able to allow the employee to create a leave request directly inside the system without call supervisor first'],
            ['project_id' =>  1, 'solution_desc' => 'The system must be able to fit', 'type_solution' => 'Usability', 'solution_revision' => 'The system must be able to fit into mobile devices (responsive web design)'],
            ['project_id' =>  1, 'solution_desc' => 'The system must be able to provide the availability', 'type_solution' => 'Reliability', 'solution_revision' => 'The system must be able to provide the availability with minimum at 99%'],
            ['project_id' =>  1, 'solution_desc' => 'The system response time must be fast', 'type_solution' => 'Performance', 'solution_revision' => 'The system response time must be less than 5 seconds'],
            ['project_id' =>  1, 'solution_desc' => 'The system codebase is developed by Microservices', 'type_solution' => 'Supportability', 'solution_revision' => 'The system codebase is developed by Service Oriented Architecture'],
            ['project_id' =>  1, 'solution_desc' => 'The system must be delivered', 'type_solution' => 'Design & Implementation Constraint', 'solution_revision' => 'The system must be delivered by the deadline'],
        ];
        foreach ($solutionDomain as $sd) {
            SolutionDomains::create($sd);
        }

        /**
         * MARK: Solution Clasification
         */
        $solutionClasification = [
            ['class_name' => 'Critical. Essential features. Failure to implement means the system will not meet customer needs. All critical features must be implemented in the release or the schedule will slip'],
            ['class_name' => 'Important. Features important to the effectiveness and efficiency of the system for most applications. The functionality cannot be easily provided in some other way. Lack of inclusion of an important feature may affect customer or user satisfaction, or even revenue, but release will not be delayed due to lack of any important feature'],
            ['class_name' => 'Useful. Features that are useful in less typical applications or for which reasonably efficient workarounds can be achieved will be used less frequently.  No significant revenue or customer satisfaction impact can be expected if such an item is not included in a release'],
        ];
        foreach ($solutionClasification as $sc) {
            SolutionClassification::create($sc);
        }

        /**
         * MARK:Feasibility
         */
        $solutionFeasibility = [
            ['feasibility_name' => 'Technical'],
            ['feasibility_name' => 'Operator'],
            ['feasibility_name' => 'Economic'],
        ];
        foreach ($solutionFeasibility as $sf) {
            SolutionFeasibility::create($sf);
        }

        /**
         * MARK:Risk
         */
        $solutionRisk = [
            ['risk_name' => 'Low'],
            ['risk_name' => 'Medium'],
            ['risk_name' => 'High'],
        ];
        foreach ($solutionRisk as $sr) {
            SolutionRisk::create($sr);
        }

        /**
         * MARK:Priority
         */
        $solutionPriority = [
            ['priority_name' => 'Mandatory'],
            ['priority_name' => 'Desirable'],
            ['priority_name' => 'Eliminasi'],
        ];
        foreach ($solutionPriority as $sp) {
            SolutionPriority::create($sp);
        }
        /**
         * MARK:Eliminated Rank
         */
        $eliminatedRank = [
            ['rank_name' => 'C-L. All Feasible, Critical, Low Risk'],
            ['rank_name' => 'C-M/H. All Feasible, Critical, Medium/High Risk'],
            ['rank_name' => 'I-L. All Feasible, Important, Low Risk'],
            ['rank_name' => 'I-M/H. All Feasible, Important, Medium/High Risk'],
            ['rank_name' => 'U-L. All Feasible, Usefull, Low Risk'],
            ['rank_name' => 'U-M/H. All Feasible, Usefull, Medium/High Risk'],
            ['rank_name' => 'C-X. Critical but there is a not feasible requirements'],
            ['rank_name' => 'I-X. Important but there is a not feasible requirements'],
            ['rank_name' => 'U-X. Usefull but there is a not feasible requirements'],
        ];
        foreach ($eliminatedRank as $er) {
            EliminatedSolutionRank::create($er);
        }
        /**
         * UseCase Seeder
         */
        $useCases = [
            ['project_id' => 1, 'case_name' => 'Creating leave request', 'case_desc' => 'This usecase consists of creating a leave request, select the leave type that will be used such as annual leave, sick leave, etc. Then upload the required document to support it. Employee can to submit leave request after create leave request.'],
            ['project_id' => 1, 'case_name' => 'Updating a leave request', 'case_desc' => 'This usecase allow the employee to edit, delete and cancel a saved leave request then modify it before submit it.'],
            ['project_id' => 1, 'case_name' => 'Tracking a leave request', 'case_desc' => 'This usecase allows employee to view and track history a leave request.'],
            ['project_id' => 1, 'case_name' => 'Checking leave request', 'case_desc' => 'This usecase allow the supervisor and HR to view their subordinate leave request.'],
            ['project_id' => 1, 'case_name' => 'Approval leave request', 'case_desc' => 'This usecase allow to the supervisor and HR to approve or decline their subordinate leave request.'],
            ['project_id' => 1, 'case_name' => 'User login to the system', 'case_desc' => 'This usecase allow all employees to login using their email as the main login system, and they also can login with Single Sign On (SSO).'],
            ['project_id' => 1, 'case_name' => 'Managing a profile employee', 'case_desc' => 'This usecase allow all employees to update their profile and request for changing their password account. HR is able to change an employee password, add and modify employee data after there are a request from their employees.'],
            ['project_id' => 1, 'case_name' => 'Showing notification of the leave request', 'case_desc' => 'This usecase allow all employees, supervisor and HR to get a notification from email and push notifitcations for some events that has happened. it includes notifications to supervisor when the subordinate requests a leave, and subordinate notifications after supervisor or HR approve their request.'],
            ['project_id' => 1, 'case_name' => 'Managing leave request reports', 'case_desc' => 'This usecase allow the HR to download the leave reports. The reports could be downloaded as PDF form.'],
        ];
        foreach($useCases as $uc){
            UseCase::create($uc);
        }

        /**
         * Use Case Actor
         */
        $useCaseActor = [
            ['project_id' => 1, 'actor_name' => 'Employee'],
            ['project_id' => 1, 'actor_name' => 'Supervisor'],
            ['project_id' => 1, 'actor_name' => 'HR'],
        ];
        foreach($useCaseActor as $uca){
            UseCaseActor::create($uca);
        }
    }
}
