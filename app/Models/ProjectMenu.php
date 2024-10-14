<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectMenu extends Model
{
    use HasFactory;

    protected $primaryKey = "id_menu";
    protected $fillable = "menu";
}
