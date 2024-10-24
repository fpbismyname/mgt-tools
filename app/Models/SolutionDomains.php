<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SolutionDomains extends Model
{
    use HasFactory;
    protected $primaryKey = "id_solution";
    protected $fillable = [
        'project_id',
        'uid_solution',
        'solution_desc',
        'type_solution',
        'potential_of_solution',
        'solution_revision',
        'solution_need',
        'solution_clasification',
        'solution_feasibility',
        'solution_risk',
        'solution_priority',
        'eliminated_solution_rank'
    ];

    //SolutionDoman(project_id) -> Projects (id_project)
    public function SolutionDomain_Projects_id()
    {
        return $this->belongsTo(Projects::class, 'id_project',);
    }
}
