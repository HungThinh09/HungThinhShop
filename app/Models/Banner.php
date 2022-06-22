<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;
    protected $table ="banners";
    protected $fillable=[
        'bannerName', 'status', 'bannerSlug','prioty','image'
    ];

    public function scopeSearch($q){
        if($key=request()->search){
            $q=$q->where('bannerName','like','%'.$key.'%');
        }
        return $q;
    }
}
