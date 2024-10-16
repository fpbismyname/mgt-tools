<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Projects extends Model
{
    use HasFactory;
    protected $primaryKey = "id_project";
    protected $fillable = ['project_name', 'project_desc', 'business_process_model', 'problem_root_cause'];

    public function Projects_ProblemDomain(){
        return $this->hasMany(ProblemDomain::class, 'project_id');
    }
}
