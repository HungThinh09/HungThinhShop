<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'user',
        'email',
        'password',
        'user'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function scopeSearch($q){
        if($search = request()->search){
            $q=$q->where('name','like','%'.$search.'%');
        }
        return $q;
    }
    public function roles(){
        return $this->belongsToMany('App\Models\Role','role_user','user_id','role_id');
    }

    public function check($check){
        $roles=auth::user()->roles;
        foreach($roles as $role){
            $permisstion = $role->permisstion; 
            if($permisstion->contains('key',$check) || $role->roleName==='Admin'){
                return True;
            }
        }
        return false;
    }

}
