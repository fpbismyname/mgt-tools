<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EliminatedSolutionRank extends Model
{
    use HasFactory;
    protected $primaryKey = "id_rank";
    public $timestamps = false;
}
