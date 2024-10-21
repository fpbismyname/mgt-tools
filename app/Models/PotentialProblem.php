<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PotentialProblem extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $primaryKey = "id_potential";
}
