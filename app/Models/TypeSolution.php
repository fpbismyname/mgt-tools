<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeSolution extends Model
{
    use HasFactory;
    protected $primaryKey = "id_type";
    public $timestamps = false;
}
