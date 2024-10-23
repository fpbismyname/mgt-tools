<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UseCaseActor extends Model
{
    use HasFactory;
    protected $primarykey = 'id_actor';
    protected $fillable = ['project_id','actor_name'];
    public $timestamps = false;

    public function UseCaseActor_Projects_id(){
        return $this->belongsTo(Projects::class,'id_project');
    }
}
