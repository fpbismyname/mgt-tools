<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SolutionFeasibility extends Model
{
    use HasFactory;
    protected $primaryKey = "id_feasibility";
    public $timestamps = false;
}
