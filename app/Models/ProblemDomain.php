<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProblemDomain extends Model
{
    use HasFactory;
    protected $table = "problem_domain";
    protected $primaryKey = "id_problem";
}
