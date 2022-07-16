<?php

namespace App\Http\Controllers;

use App\Helper\CartHelper;
use App\Http\Requests\home\AddOrder;
use App\Models\Order;
use App\Models\Order_product;


class OrderController extends Controller
{
    private $order;
    public function __construct(Order $order, Order_product $order_product)
    {
      $this->order=$order;  
      $this->orderProduct=$order_product;  
    }
    public function order(AddOrder $data, CartHelper $cart){
        $codeId = substr($data['phone'], -3,) . rand(1, 10000); 
      
        $order = $this->order->create([
            'name' => $data['name'],
            'phone' => $data['phone'],
            'address' => $data['address'],
            'note' => $data['note'],
            'codeId' => $codeId,
            'email' => $data['email']
        ]);
        if($order){
            foreach ($cart->items as $item) {
                $this->orderProduct->create([
                    'product_id' => $item['id'],
                    'order_id' => $order->id,
                    'quantity' => $item['quantity'],
                    'price' => $item['priceSale']
                ]);
            }
           $this->order->sendEmail($order);
                return redirect()->back()
                ->with('success','Bạn đã đặt hàng thành công ! Mã đơn hàng của bạn là : '.$codeId.' Thông tin chi tiết đã được gửi vào email của bạn');
        } return redirect()->back()->with('error','Đặt hàng thất bại');
      
    }
}
