<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProblemDomain extends Model
{
    use HasFactory;
    protected $primaryKey = "id_problem";
    protected $fillable = ['problem_name','id_project', 'uid_problem'];
    //ProblemDomain(project_id) -> Projetcs (id_project)
    public function ProblemDomain_Projects_id(){
        return $this->belongsTo(Projects::class, 'id_project');
    }
}