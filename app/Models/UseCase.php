<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UseCase extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_usecase';
    protected $fillable = ['project_id','uid_case','case_name','case_desc','case_actor','case_for_solution','case_for_type_solution'];

    public function UseCase_Projects_id(){
        return $this->belongsTo(Projects::class, 'id_project');
    }
}
