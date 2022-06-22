<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    protected $fillable = [
        'roleName', 'description'
    ];
    protected $table = 'role';
    public function scopeSearch($q)
    {
        if ($search = request()->search) {
            $q = $q->where('roleName', 'like', '%' . $search . '%');
        }
        return $q;
    }
    public function user()
    {
        return $this->belongsToMany('App\Models\User', 'role_user', 'role_id', 'user_id');
    }
    public function permisstion()
    {
        return $this->belongsToMany('App\Models\Permisstion', 'role_permisstions', 'role_id', 'permisstion_id');
    }
}
