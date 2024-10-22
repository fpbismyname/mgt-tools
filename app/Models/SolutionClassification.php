<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SolutionClassification extends Model
{
    use HasFactory;
    public $primarykey = 'id_class';
    public $timestamps = false;
}
