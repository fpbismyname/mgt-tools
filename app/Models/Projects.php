<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Projects extends Model
{
    use HasFactory;
    protected $primaryKey = "id_project";
    protected $fillable = ['project_name', 'project_desc', 'business_process_model', 'problem_root_cause'];

    //Project (id_project) -> ProblemDomain (project_id)
    public function Projects_ProblemDomain_id(){
        return $this->hasMany(ProblemDomain::class, 'project_id');
    }
    //Project (id_project) -> SolutionDoman(project_id)
    public function Projects_SolutionDomain_id(){
        return $this->hasMany(SolutionDomains::class, 'project_id');
    }
    //Project (id_project) -> UseCase(project_id)
    public function Projects_UseCase_id(){
        return $this->hasMany(UseCase::class, 'project_id');
    }
    //Project (id_project) -> UseCaseActor(project_id)
    public function Projects_UseCaseActor_id(){
        return $this->hasMany(UseCaseActor::class, 'project_id');
    }
}