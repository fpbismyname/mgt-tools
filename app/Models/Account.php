<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
class Account extends Authenticatable
{
    use HasFactory;
    protected $guard = 'mgt_guard';
    protected $table = "accounts";
    protected $primaryKey = "id_account";
    protected $fillable = ['nama_lengkap', 'email', 'password'];
}
