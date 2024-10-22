<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SolutionRisk extends Model
{
    use HasFactory;
    protected $primaryKey = "id_risk";
    public $timestamps = false;
}
