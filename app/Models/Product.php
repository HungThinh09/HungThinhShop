<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\View\Components\Recusive;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $fillable = [
        'productName',    'productSlug',    'description',    'user_id',    'price',    'image',
        'imageList',    'tag',    'sale',    'status', 'active'

    ];

    public function category()
    {
        return $this->belongsToMany('App\Models\Category', 'product_category', 'product_id', 'category_id');
    }
    public function scopeBycategory($query)
    {
        if(!empty(request()->id)){
            $query = $query
            ->join('product_category', 'product_category.product_id', 'products.id')
            ->where('product_category.category_id',request()->id);
            
        }elseif(request()->slug ) {
            $danhmuc = DB::table('categories')->where('categorySlug', request()->slug)->first();
            $query = $query
                ->join('product_category', 'product_category.product_id', 'products.id')
                ->where('product_category.category_id', $danhmuc->id);
        }
       
        return $query;
    }

    public function scopeSearchProduct($query)
    {
        if ($search = request()->search) {
            $query = $query->where('productName', 'like', '%' . $search . '%');
        }
        return $query;
    }
    public function scopeStatus($q){
        if(isset(request()->status)){
            $q=$q->where('status',request()->status);
        }
        return $q;
    }
    public function scopeMax($q){
        if(isset(request()->max)){
            $q=$q->where('price', '<=', request()->max); 
           
        }
        return $q;
    }
    public function scopeMin($q){
        if(isset(request()->min)){
            $q=$q->where('price','>=',request()->min);
        }
        return $q;
    }
}
