<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permisstion_role extends Model
{
    use HasFactory;
    protected $table = "role_permisstions";
    protected $fillable = [
    'role_id', 'permisstion_id'
    ];
}
