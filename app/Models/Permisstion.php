<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permisstion extends Model
{
    use HasFactory;
    protected $table ="permisstion";
    public $timestamps = false;
    protected $fillable = [
        'name', ' display', 'parent_id', 'key'
    ];
    public function childPer(){
        return $this->hasMany(Permisstion::class,'parent_id');
    }
}
