<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SolutionPriority extends Model
{
    use HasFactory;
    protected $primaryKey = "id_priority";
    public $timestamps = false;
}
