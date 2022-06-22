<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\View\Components\Recusive;
use Illuminate\Support\Facades\DB;


class Category extends Model
{
    use HasFactory;
    protected $table = 'categories';
    // protected $guarded=[];
    protected $fillable = [
        'categoryName', 'status', 'prioty', 'categorySlug', 'parent_id'
    ];

    public function product()
    {
        return $this->belongsToMany('App\Models\Product', 'product_category', 'category_id', 'product_id');
    }
    public function child(){
        return $this->hasMany(Category::class,'parent_id');
    }

    public function getCategory($parentId, $data)
    {
        $recusive = new Recusive($data);
        $htmlOption = $recusive->cateList($parentId);
        return $htmlOption;
    }

    public function eidtCategory($data, $cateIds)
    {
        $recusive = new Recusive($data);
        $cateIds = explode('!', $cateIds);
        $htmlOption = $recusive->cateEdit($cateIds);
        return $htmlOption;
    }

    public function scopeSearch($query)
    {
        if ($search = request()->search) {
            $query = $query->where('categoryName', 'like', '%' . $search . '%');
        }
        return $query;
    }
}
