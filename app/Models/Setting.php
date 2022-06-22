<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;
    protected $table ="table_setting";
    protected $fillable=[
        'settingName', 'value', 'status',
    ];

    public function scopeSearch($q){
        if($search=request()->search){
            $q=$q->where('settingName','like','%'.$search."%");
        }
        return $q;
    }

}
