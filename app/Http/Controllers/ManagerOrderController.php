<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;


class ManagerOrderController extends Controller
{
    private $order;
    public function __construct(Order $order)
    {
        $this->order=$order;
    }
        public function index(){
            $paginate =20;
            $order= $this->order->searchCodeId()->statusOrder()->paginate($paginate);
            return view('admin.order.index',[
                'title' => 'Manager Order',
                'tieude' => 'Danh sách đơn hàng ('.count($order).')',
                'orders' => $order,
                'paginate' => $paginate
            ]);
        }

        public function show($id){
            $order= $this->order->find($id);
            return view('admin.order.show',[
                'title' => 'Manager Order',
                'tieude' => ' Đơn hàng ('.$order->codeId.')',
                'order' => $order,
            ]);
        }

        public function update($id){
            $order= $this->order->find($id);
            if($order){
                $order->update([
                    'status' => request()->status,
                ]);
            }
            return redirect()->back()->with('success','Thay đổi thành công');
        }
     
}
