<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Mail;

class Order extends Model
{
    use HasFactory;
    protected $table = 'order';
    protected $fillable= [
        'name' , 'codeId' , 'email','status','address', 'phone', 'note'
    ];

    public function cart()
    {
        return $this->belongsToMany(Product::class, 'order_product', 'order_id', 'product_id');
    }
    public function carts()
    {
        return $this->hasMany(order_product::class, 'order_id');
    }

    public function sendEmail($data)
    {
        Mail::send(
            'home.email',
            compact('data'),
            function ($message) use ($data) {
                $message->to($data->email, $data->name);
                $message->subject('Thông tin Đơn hàng');
            }
        );
    }
    public function scopeSearchCodeId($q){
        if($id=request()->search){
            $q=$q->where('status', $id);
        }
        return $q;
    }
    public function scopeStatusOrder($q){
        if(isset(request()->status)){
            $q=$q->where('status', request()->status);
        }
        return $q;
    }

}
